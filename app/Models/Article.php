<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $table = 'article';
    public $timestamps = false;
    protected $fillable = [
        'slug', 'title', 'content', 'og_image', 'meta_desc', 'status', 'user_id', 'publish_date'
    ];

    public function Category()
    {
        return $this->belongsToMany(Category::class, 'article_category');
    }

    public function User(){
        return $this->belongsTo(User::class);
    }

}
