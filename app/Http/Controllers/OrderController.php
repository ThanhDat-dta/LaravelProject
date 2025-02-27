<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Order;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function showOrder($id)
    {
        $foodItem = Food::find($id);

        if (!$foodItem) {
            return redirect()->route('home')->with('error', 'Món ăn không tồn tại!');
        }

        $relatedProducts = Food::where('category', $foodItem->category)->take(4)->get();
        $reviews = Review::where('food_id', $id)->with('user')->get();

        return view('order', compact('foodItem', 'relatedProducts', 'reviews'));
    }

    public function addToCart(Request $request)
    {
        $foodItem = Food::find($request->id);

        if (!$foodItem) {
            return response()->json(['error' => 'Món ăn không tồn tại!'], 404);
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$request->id])) {
            $cart[$request->id]['quantity']++;
        } else {
            $cart[$request->id] = [
                'name' => $foodItem->name,
                'quantity' => $request->quantity,
                'price' => $foodItem->price,
                'image' => $foodItem->image,
            ];
        }

        session()->put('cart', $cart);

        return response()->json(['message' => 'Món ăn đã được thêm vào giỏ hàng!']);
    }

    public function buyNow(Request $request)
    {
        $foodItemId = $request->input('foodItemId');
        $quantity = $request->input('quantity', 1);

        $foodItem = Food::find($foodItemId);

        if (!$foodItem) {
            return response()->json(['error' => 'Món ăn không tồn tại!'], 404);
        }

        $order = Order::create(['user_id' => Auth::id(), 'status' => 'pending']);
        $order->items()->create([
            'name' => $foodItem->name,
            'price' => $foodItem->price,
            'quantity' => $quantity,
            'image' => $foodItem->image,
        ]);

        return response()->json(['message' => 'Order placed successfully!']);
    }

    public function storeReview(Request $request, $id)
    {
        $request->validate([
            'comment' => 'required',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        Review::create([
            'food_id' => $id,
            'user_id' => Auth::id(),
            'comment' => $request->comment,
            'rating' => $request->rating,
        ]);

        return back()->with('success', 'Đánh giá của bạn đã được lưu.');
    }

    public function orderHistory()
    {
        $orders = Order::where('user_id', Auth::id())->with('items')->get();
        return view('order-history', compact('orders'));
    }
}