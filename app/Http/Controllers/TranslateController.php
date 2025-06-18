<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TranslateController extends Controller
{
    public function index() {
        return view('translate.index');
    }

    public function translate(Request $request) {
        $request->validate([
            'source_lang' => 'required',
            'target_lang' => 'required',
            'text' => 'required|string',
        ]);

        $response = Http::asForm()->post('https://api-free.deepl.com/v2/translate', [
            'auth_key' => env('DEEPL_API_KEY'),
            'text' => $request->input('text'),
            'source_lang' => $request->input('source_lang'),
            'target_lang' => $request->input('target_lang'),
        ]);

        $translated = $response->json()['translations'][0]['text'] ?? null;

        return response()->json([
            'translated' => $translated,
        ]);
    }
}
