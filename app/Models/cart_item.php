<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart_item extends Model
{
    use HasFactory;
    protected $table = 'cart_item';
    public function session()
    {
        return $this->belongsTo('App\Models\shopping_session');
    }
}
