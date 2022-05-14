<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'category_id', 'image', 'content'];

    public function category()
    {
      return $this->belongsTo('App\Models\Category', 'category_id');
      // return $this->belongsTo(Category::class, 'category_id')->withDefault();
    }
}
