<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class notice extends Model
{
    use HasFactory;
    protected $table = 'notice';

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function setStatus(){
        return $this->status = 1;
    }

    public function getSubtractMin(){
        return Carbon::now()->diffInHours(Carbon::parse($this->created_at));
    }
}
