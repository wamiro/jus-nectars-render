<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','slug','description','origins','fabrication','price_cfa','volume_ml',
        'range','occasion','availability','image_url','category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}