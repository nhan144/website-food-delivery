<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class store extends Model
{
    use HasFactory;
    protected $table = 'store';
    
    public function food(){
        return $this->hasMany(food::class);
    }

    public function owner(){
        return $this->belongsTo(User::class);
    }

    public function order(){
        return $this->hasMany(order::class);
    }

    public function adminNewOrder(){
        return $this->hasMany(order::class)->where('status','=',0);
    }

    public function bill(){
        return $this->hasMany(bill::class);
    }
}
