<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'barcode',
        'name',
        'category_id',
        'unit_id',
        'price',
        'stock'
    ];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id','id');
    }

    public function unit(){
        return $this->belongsTo(Unit::class);
    }

    public function stocks(){
        return $this->hasMany(Stock::class);
    }
}
