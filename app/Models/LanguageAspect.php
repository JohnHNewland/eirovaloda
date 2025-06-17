<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LanguageAspect extends Model
{
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $fillable = [
        'language_aspect'
    ];

    public function materials() {
        return $this->hasMany(Material::class);
    }
}
