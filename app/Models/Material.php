<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'file_name',
        'file_path',
        'description',
        'language',
        'language_level',
        'language_aspect',
        'user_id',
        'folder_id',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function folder() {
        return $this->belongsTo(Folder::class);
    }

    public function language() {
        return $this->belongsTo(Language::class);
    }

    public function languageLevel() {
        return $this->belongsTo(LanguageLevel::class);
    }

    public function languageAspect() {
        return $this->belongsTo(LanguageAspect::class);
    }

    public function userLikes() {
        return $this->hasMany(UserLike::class);
    }
}
