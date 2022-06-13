<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'img',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function address(){
        return $this->hasMany(address::class);
    }

    public function store(){
        return $this->hasOne(store::class);
    }

    public function cart(){
        return $this->hasMany(cart::class);
    }
    public function favorite(){
        return $this->hasMany(favorite::class);
    }

    public function notice(){
        return $this->hasMany(notice::class);
    }

    public function newNotice(){
        return $this->hasMany(notice::class)->where('status','=',0);
    }
    public function adminNewNotice(){
        return $this->hasMany(notice::class)->where('status','=',2);
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
