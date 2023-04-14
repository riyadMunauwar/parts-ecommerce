<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class ParentCategoryController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $categories = Category::whereNull('parent_id')->where('is_published', true)->paginate(30);

        return view('front.pages.parent-categories', compact('categories'));
    }
}
