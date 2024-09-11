<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bill extends Model
{
    protected $fillable =[
        'product_id',
        'user_id',
        'quantity',
        'product_name',
        'product_price',
    ];
    use HasFactory;
    public function products():HasMany
    {
        return $this->hasMany(products::class );
    }
   
}
