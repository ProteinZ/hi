<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'description',
        'image',
        'parent_id',
        'is_active',
        'is_delete'
    ];

    // Quan hệ cha
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    // Quan hệ con
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
}
