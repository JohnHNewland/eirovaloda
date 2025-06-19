<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use App\Models\Language;
use App\Models\LanguageAspect;
use App\Models\LanguageLevel;
use App\Models\Material;
use App\Models\UserLike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    public function indexAspect(string $locale, string $level, string $topic) {
        if(session()->has('language')) {
            $language = session()->get('language');
        }
        $materials = Material::with('languageLevel', 'languageAspect')->whereHas('languageLevel', fn($q) => $q->where('id', $level))
            ->whereHas('languageAspect', fn($q) => $q->where('id', $topic));
            // This does include the use of a lambda function, quite sketchy, but could not find a more concise way

        if(isset($language)) {
            $materials = $materials->where('language_id', $language);
        }

        $materials = $materials->get();
        $languages = Language::all();

        return view('materials.index', compact('materials', 'languages'));
    }

    public function applyFilter(Request $request) {
        $language = $request->input('languageSelect');
        return redirect()->back()->with('language', $language)->withInput();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $languages = Language::all();
        $languageLevels = LanguageLevel::all();
        $languageAspects = LanguageAspect::all();
        return view('materials.upload', compact('languages', 'languageLevels', 'languageAspects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'file_name' => 'required|string|max:255',
            'file_path' => 'required|file|mimes:pdf,docx|max:10240', // max 10MB
            'language_id' => 'required|string',
            'language_level_id' => 'required|string',
            'language_aspect_id' => 'required|string',
            'description' => 'nullable|string|max:500',
        ]);

        $level = LanguageLevel::find($validated['language_level_id']);
        $aspect = LanguageAspect::find($validated['language_aspect_id']);

        if (!$level || !$aspect) {
            abort(404, 'Language level or aspect not found.');
        }

        // Handle file upload
        if ($request->hasFile('file_path')) {
            $path = $request->file('file_path')->store('materials', 'public');
            $validated['file_path'] = $path;
        }

        $parentFolder = Folder::where('folder_name', $level->id)->first();

        $folder = Folder::where('parent_id', $parentFolder->id)
            ->where('folder_name', $aspect->id)
            ->first();

        $validated['user_id'] = auth()->id();
        $validated['folder_id'] = $folder->id;

        Material::create($validated);

        return redirect()->back()->with('status', __('materials.uploaded'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $locale, string $id)
    {
        $material = Material::with('language', 'languageLevel', 'languageAspect')->findOrFail($id);
        $liked = UserLike::where('material_id', $id)->where('user_id', auth()->id())->first();
        if($liked) {
            $liked = 1;
        } else {
            $liked = 0;
        }
        return view('materials.show', compact('material', 'liked'));
    }

    public function download(string $locale, string $id) {
        $material = Material::findOrFail($id);

        return Storage::disk('public')->download($material->file_path, $material->file_name);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $locale, string $id)
    {
        $material = Material::findOrFail($id);
        $languages = Language::all();
        $languageLevels = LanguageLevel::all();
        $languageAspects = LanguageAspect::all();
        return view('materials.edit', compact('material', 'languages', 'languageLevels', 'languageAspects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $locale, string $id)
    {
        if (auth()->user()->cannot('update', Material::class)) {
            abort(403, 'You are not authorized to update this material.');
        }

        $material = Material::findOrFail($id);

        $validated = $request->validate([
            'file_name' => 'required|string|max:255',
            'language_id' => 'required|string',
            'language_level_id' => 'required|string',
            'language_aspect_id' => 'required|string',
            'description' => 'nullable|string|max:500',
        ]);

        $material->file_name = $validated['file_name'];
        $material->language_id = $validated['language_id'];
        $material->language_level_id = $validated['language_level_id'];
        $material->language_aspect_id = $validated['language_aspect_id'];
        $material->description = $validated['description'];
        $material->save();

        return redirect()->route('materials.show', [app()->getLocale(), $material->id])->with('status', __('materials.updated'));


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $locale, string $id)
    {
        $material = Material::findOrFail($id);
        if (auth()->user()->cannot('delete', $material)) {
            abort(403, 'You are not authorized to delete this material.');
        }

        if (Storage::disk('public')->exists($material->file_path)) {
            Storage::disk('public')->delete($material->file_path);
        }

        $material->delete();
        return redirect()->route('materials')->with('status', __('materials.deleted'));
    }
}
