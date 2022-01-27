<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryTestController extends Controller
{
    public function index0()
    {
//        $categories = Category::all();
//        return view('category.index0', compact('categories'));

        //Whit View share and View Composer
        return view('category.index0');

    }

}
