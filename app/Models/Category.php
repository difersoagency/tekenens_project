<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'category';
    public $timestamps = false;
    protected $fillable = [
        'name'
    ];

    public function Article()
    {
        return $this->belongsToMany(Article::class);
    }

    public function Portofolio()
    {
        return $this->belongsToMany(Portofolio::class);
    }
}
