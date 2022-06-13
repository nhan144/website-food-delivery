<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    protected $table = 'order';

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function store(){
        return $this->belongsTo(store::class);
    }
}
