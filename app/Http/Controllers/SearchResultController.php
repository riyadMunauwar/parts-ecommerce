<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Cache;
use App\Services\SearchKeywordService;

class SearchResultController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, SearchKeywordService $searchKeyword)
    {
        $searchQuery = $request->query('search_query') ?? '';

        if(!$searchQuery) return abort(404);

        // $page = $request->query('page', 1);

        // $cacheKey = "search:{$searchQuery}_page:{$page}";

        // $products = Cache::remember($cacheKey, 3600, function() use($page, $searchQuery){
        //     return Product::where('search_name', 'like', '%' . $searchQuery . '%')->orWhere('search_name', $searchQuery)->paginate(12)->withQueryString();
        // });

        $products = Product::where('search_name', 'like', '%' . $searchQuery . '%')->orWhere('search_name', $searchQuery)->paginate(12)->withQueryString();

        $searchKeyword->processKeyword($searchQuery, $products->total());
        
        return view('front.pages.search-results', compact('searchQuery', 'products'));
    }
}
