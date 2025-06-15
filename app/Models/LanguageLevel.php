<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LanguageLevel extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'language_level'
    ];

    public function materials() {
        return $this->hasMany(Material::class);
    }
}
