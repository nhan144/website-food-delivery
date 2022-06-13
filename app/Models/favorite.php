<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class favorite extends Model
{
    use HasFactory;
    protected $table = 'favorite';
    public $timestamps = false;
    
    public function userInfo(){
        return $this->belongsTo(User::class);
    }

    public function food(){
        return $this->hasOne(food::class);
    }
}
