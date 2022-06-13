<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class food extends Model
{
    use HasFactory;
    protected $table = 'food';
    
    public function store(){
        return $this->belongsTo(store::class);
    }

    public function favorite(){
        return $this->belongsTo(favorite::class);
    }
    public function cart(){
        return $this->hasMany(cart::class);
    }
    public function category(){
        return $this->hasMany(category::class);
    }
}
