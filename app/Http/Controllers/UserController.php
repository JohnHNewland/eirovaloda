<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\User;
use App\Models\UserLike;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showProfile(string $locale, string $id) {
        $user = User::findOrFail($id);
        $materials = Material::where('user_id', $id)->get();
        $likes = UserLike::with('material')->where('user_id', $id)
            ->orderBy('id', 'desc')
            ->take(10)
            ->get()
            ->pluck('material'); // extract the materials from the likes

        if (auth()->user()->cannot('view', $user)) {
            abort(403, 'You are not authorized to view this profile.');
        }

        return view('profile.show', compact('user', 'materials', 'likes'));
    }
}
