<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;
    protected $fillable = [
        "unique_id",
        "user_id",
        'city',
        'state',
        "phone",
        "mobile",
        'address',
        'description',
        'Slogan'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
