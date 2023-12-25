<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'category_id', 'content', 'image'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
