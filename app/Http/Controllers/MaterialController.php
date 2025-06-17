<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Models\LanguageAspect;
use App\Models\LanguageLevel;
use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(session()->has('language')) {
            $language = session()->get('language');
        }

        $materials = Material::all();
        $languages = Language::all();
        if(isset($language)) {
            $materials = $materials->where('language_id', $language);
        }

        return view('materials.index', compact('materials', 'languages'));
    }

    public function indexAspect(string $level, string $topic) {
        if(session()->has('language')) {
            $language = session()->get('language');
        }

        $materials = Material::with('languageLevel', 'languageAspect')->whereHas('languageLevel', fn($q) => $q->where('id', $level))
            ->whereHas('languageAspect', fn($q) => $q->where('id', $topic));
            // This does include the use of a lambda function, quite sketchy, but could not find a more concise way

        if(isset($language)) {
            $materials = $materials->where('language', $language);
        }

        $materials = $materials->get();
        $languages = Language::all();

        return view('materials.index', compact('materials', 'languages'));
    }

    public function applyFilter(string $language) {
        return redirect()->back()->with('language', $language);
    }

    public function showUpload() {
        $languages = Language::all();
        $languageLevels = LanguageLevel::all();
        $languageAspects = LanguageAspect::all();
        return view('materials.upload', compact('languages', 'languageLevels', 'languageAspects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
