<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Memory extends Model
{
    protected $fillable = [
        'image',
        'title',
        'description',
    ];

    public function getImageUrlAttribute()
{
    return asset('storage/' . $this->image);
}
}
