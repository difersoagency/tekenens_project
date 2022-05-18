<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    protected $table = 'team';
    public $timestamps = false;
    protected $fillable = [
        'name', 'photo', 'role', 'status', 'path'
    ];
}
