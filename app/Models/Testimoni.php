<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimoni extends Model
{
    protected $table = 'testimoni';
    public $timestamps = false;
    protected $fillable = [
        'name', 'description', 'photo'
    ];
}
