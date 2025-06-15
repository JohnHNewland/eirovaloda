<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'language'
    ];

    public function materials() {
        return $this->hasMany(Material::class);
    }
}
