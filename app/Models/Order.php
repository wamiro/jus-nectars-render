<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['customer_name','customer_email','address','city','notes','total_cfa','status'];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}