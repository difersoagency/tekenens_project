<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portofolio extends Model
{
    use HasFactory;
    protected $table = 'portofolio';
    public $timestamps = false;
    protected $fillable = [
        'slug', 'title', 'description', 'publish_date', 'status'
    ];
    public function Category()
    {
        return $this->belongsToMany(Category::class, 'portofolio_category');
    }
    public function Team()
    {
        return $this->belongsToMany(Team::class);
    }
}
