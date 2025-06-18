<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\UserLike;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function like(Request $request, string $locale, string $id, string $liked) {
        $material = Material::find($id);
        if($liked) {
            $material->likes -= 1;
            $material->save();

            $likeToRemove = UserLike::where('material_id', $id)->where('user_id', auth()->id())->first();
            $likeToRemove->delete();
            $liked = false;
            return redirect()->route('materials.show', $material->id)->with('status', __('materials.unliked'));
        } else {
            $material->likes += 1;
            $material->save();

            UserLike::create([
                'material_id' => $id,
                'user_id' => auth()->id(),
            ]);

            $liked = true;

            return redirect()->route('materials.show', $material->id)->with('status', __('materials.liked'));
        }
    }
}
