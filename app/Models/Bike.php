<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bike extends Model
{
    use HasFactory;

    protected $fillable = ['description', 'model', 'amount', 'purchased_in',
    'buyer_name', 'store_name'];

    public $timestamps = false;
}
