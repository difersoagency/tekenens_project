<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;
    protected $table = 'page';
    public $timestamps = false;
    protected $fillable = [
        'meta_desc', 'media', 'page_name'
    ];
    public function DetailPageDesc()
    {
        return $this->hasMany(DetailPageDesc::class);
    }
}
