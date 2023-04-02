<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class CustomPageController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $pageSlug = $request->pageSlug;

        $page = Page::where(['slug' => $pageSlug, 'is_published' => true])->first();

        if(!$page) return abort(404);

        return view('front.pages.custom-page', compact('page'));

    }
}
