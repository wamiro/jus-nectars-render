<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug', 'type']; // type: jus, nectar, the_glace

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}