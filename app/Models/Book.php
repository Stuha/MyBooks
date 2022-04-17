<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'author_name', 'category', 'publish_at', 'country', 'page_no'
    ];

    public function categories()
    {
        return $this->belongsTo(Book::class, 'category_id', 'id');
    }
}
