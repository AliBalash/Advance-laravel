<?php

namespace App\Http\Views;

use App\Models\Category;
use Illuminate\View\View;

class CategoryComposer
{

//    Notice: dependency added in class Compos not facade
    public function compose(View $view)
    {
        $view->with('categories', Category::orderBy('id')->get());
    }

}
