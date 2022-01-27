<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index1()
    {
//        $categories = Category::orderBy('name')->get();
//        return view('category.index1', compact('categories'));

        //Whit View share and View Composer
        return view('category.index1');


    }
    public function index2()
    {
//        $categories = Category::orderBy('name','DESC')->get();
//        return view('category.index2', compact('categories'));

        //Whit View share and View Composer
        return view('category.index2');


    }
}
