<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;

class Localization
{
    public function handle(Request $request, Closure $next)
    {

        $allowedLocales = ['en', 'lv'];
        // Check if the language cookie exists (this is primary)
        if ($request->hasCookie('language')) {
            $language = $request->cookie('language');

            // Optionally, validate language against allowed locales
            if (in_array($language, $allowedLocales)) {
                App::setLocale($language);
            } else {
                abort(404, 'The cookie language is not allowed.');
            }
        } else { // Secondary
            $locale = $request->route('locale');

            if (!in_array($locale, $allowedLocales)) {
                abort(404, 'No locale set');
            }

            App::setLocale($locale);
            URL::defaults(['locale' => $locale]);
        }

        return $next($request);
    }
}
