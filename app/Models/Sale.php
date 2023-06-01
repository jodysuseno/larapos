<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    // public function invoice(){
    //     $sql = Model::all();
    // }

    protected $fillable = [
        'invoice',
        'customer_id',
        'user_id',
        'total_price',
        'cash',
        'remaining',
        'note',
        'date'
    ];
}
