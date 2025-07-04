<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserLike extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'user_id',
        'material_id',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function material() {
        return $this->belongsTo(Material::class);
    }
}
