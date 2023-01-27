<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public $table = 'posts';

    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'sub_title',
        'body',
        'published_at',
        'created_at',
        'updated_at',
    ];

    protected $dates = [
        'published_at',
        'created_at',
        'updated_at',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
