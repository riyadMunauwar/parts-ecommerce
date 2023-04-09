<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SingleProductController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $productSlug = $request->productSlug;
        $productId = $request->productId;
        return view('front.pages.single-product', compact('productSlug', 'productId'));
    }
}
