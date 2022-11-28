<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['image1', 'image2', 'description', 'number'];
    public function shop(){
        return $this->belongsTo(Shop::class);
    }
}
