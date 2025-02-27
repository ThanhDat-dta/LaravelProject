<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'quantity' => 'required|integer|min:1',
            'image' => 'required|string',
        ]);

        $cart = Cart::firstOrCreate(['user_id' => Auth::id()]);

        $cartItem = new CartItem($request->only(['name', 'price', 'quantity', 'image']));
        $cart->items()->save($cartItem);

        return response()->json(['message' => 'Item added to cart successfully']);
    }

    public function viewCart()
    {
        $cart = Cart::with('items')->where('user_id', Auth::id())->first();

        return view('cart', compact('cart'));
    }

    public function getItemCount()
    {
        $cart = Cart::where('user_id', Auth::id())->first();
        $count = $cart ? $cart->items->sum('quantity') : 0;

        return response()->json(['count' => $count]);
    }

    public function removeItem($id)
    {
        $cartItem = CartItem::find($id);
        if ($cartItem) {
            $cartItem->delete();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false]);
    }

    public function checkout(Request $request)
    {
        $itemIds = $request->input('items');
        $items = CartItem::whereIn('id', $itemIds)->get();

        foreach ($items as $item) {
            $quantity = $request->input('quantity_' . $item->id);
            if ($quantity !== null) {
                $item->quantity = $quantity;
                $item->save();
            }
        }

        $totalPrice = $items->sum(function ($item) {
            return $item->price * $item->quantity;
        });

        $order = Order::create(['user_id' => Auth::id(), 'status' => 'pending', 'total_price' => $totalPrice]);
        foreach ($items as $item) {
            $order->items()->create([
                'name' => $item->name,
                'price' => $item->price,
                'quantity' => $item->quantity,
                'image' => $item->image,
            ]);
        }

        CartItem::whereIn('id', $itemIds)->delete();

        return response()->json(['message' => 'Checkout successful!']);
    }
}