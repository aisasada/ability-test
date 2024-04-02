<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('index', ['categories' => $categories]);
    }

    public function confirm()
    {
        return view('confirm');
    }

    public function store(Request $request)
    {
        return view('thanks');
    }
}
