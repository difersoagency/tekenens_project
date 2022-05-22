<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobVacancy extends Model
{
    use HasFactory;
    protected $table = 'job_vacancy';
    public $timestamps = false;
    protected $fillable = [
        'slug', 'title', 'description', 'email', 'status', 'photo'
    ];
    public function Category()
    {
        return $this->belongsToMany(Category::class);
    }
    public function Team()
    {
        return $this->belongsToMany(Team::class);
    }
}
