<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function switchLang($locale)
    {
        $availableLocales = ['en', 'lv'];
        if (in_array($locale, $availableLocales)) {
            session(['applocale' => $locale]);
            app()->setLocale($locale);
        }

        // Get the previous URL and replace its locale (could not find a less cut-throat way)
        $previous = url()->previous();
        $segments = explode('/', parse_url($previous, PHP_URL_PATH));
        $segments[1] = $locale; // Replace locale segment
        $newUrl = url(implode('/', $segments));

        return redirect($newUrl);
    }

}
