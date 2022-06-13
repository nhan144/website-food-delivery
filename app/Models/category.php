<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    protected $table = 'category';
    public $timestamps = false;
    
    public function food(){
        return $this->belongsTo(food::class);
    }
}
