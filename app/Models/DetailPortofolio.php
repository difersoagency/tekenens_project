<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPortofolio extends Model
{
    use HasFactory;
    protected $table = 'detail_portofolio';
    public $timestamps = false;
    protected $fillable = [
        'title', 'media'
    ];
    
}
