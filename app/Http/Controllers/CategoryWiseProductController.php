<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

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
        $category = Category::find($request->categoryId);

        if(!$category){
            return abort(404);
        }

        $categorySlug = $request->categorySlug;
        $categoryId = $request->categoryId;

        return view('front.pages.category-wise-product-list', compact('category', 'categoryId','categorySlug'));
    }
}
