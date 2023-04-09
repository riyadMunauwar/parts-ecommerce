<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryWiseProductController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $categorySlug = $request->categorySlug;
        $categoryId = $request->categoryId;
        return view('front.pages.category-wise-product-list', compact('categoryId','categorySlug'));
    }
}
