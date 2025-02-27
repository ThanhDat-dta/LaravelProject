<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;

class FoodController extends Controller
{
    public function showCategory($category)
    {
        $foods = Food::where('category', $category)->get();
        return view('menu.category', compact('foods', 'category'));
    }
}