<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPageDesc extends Model
{
    use HasFactory;
    protected $table = 'detail_page_desc';
    public $timestamps = false;
    protected $fillable = [
        'page_id', 'title', 'media', 'description'
    ];
    public function Page()
    {
        return $this->belongsTo(Page::class);
    }
}
