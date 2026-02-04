<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;
}
