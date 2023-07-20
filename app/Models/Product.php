<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description','quantity','category_id','discount_price', 'price', 'image'];

    public function getImageUrl()
    {
        if ($this->image) {
            return asset('storage/' . $this->image);
        }

        return null;
}

public function category()
{
  return $this->belongsTo(Category::class);
}
}