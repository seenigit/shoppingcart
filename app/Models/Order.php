<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function users() {
        $this->belongsTo(User::class);
    }
    
    public function orderdetails(){
        $this->hasMany(OrderDetail::class);
    }
}
