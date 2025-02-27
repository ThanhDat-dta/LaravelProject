<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::with('user', 'food')->get();
        return view('admin.reviews.index', compact('reviews'));
    }

    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();
        return redirect()->route('admin.reviews.index')->with('success', 'Review deleted successfully.');
    }

    public function reply(Request $request, $id)
    {
        $request->validate([
            'reply' => 'required|string|max:255',
        ]);

        $review = Review::findOrFail($id);
        $review->reply = $request->input('reply');
        $review->save();

        return redirect()->route('admin.reviews.index')->with('success', 'Reply added successfully.');
    }
}