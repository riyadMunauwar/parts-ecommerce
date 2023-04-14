<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class LocalizationController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $locale = $request->language;

        if($locale === 'en' || $locale === 'es'){
            App::setLocale($locale);
            session()->put('locale', $locale);
        }

        return redirect()->back();
    }
}
