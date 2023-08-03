<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    use Notifiable;
    protected $fillable = ['product_title', 'quantity','price','image','payment_status', 'delivery_status'];

}
