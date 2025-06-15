<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'parent_id',
        'folder_name'
    ];

    public function folder() {
        return $this->belongsTo(Folder::class);
    }

    public function materials() {
        return $this->hasMany(Material::class);
    }
}
