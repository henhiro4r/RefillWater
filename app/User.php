<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $fillable = [
        'name','email','password','gender','majors','balance','role_id','activation_token','is_verified','is_active','is_login'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role() {
        return $this->belongsTo('App\Role');
    }

    public function tickets() {
        return $this->hasMany('App\Ticket');
    }

    public function bottles() {
        return $this->hasMany('App\Bottle');
    }

    public function transactions() {
        return $this->hasMany('App\Transaction');
    }

    public function topups() {
        return $this->hasMany('App\TopUp');
    }

    public function isRoot(){
        if ($this->role->name == 'Root' && $this->is_verified == 1 && $this->activation_token == null && $this->is_login = '1' && $this->is_active = '1'){
            return true;
        }
        return false;
    }

    public function isAdmin(){ // SC, SRB, AS, etc
        if ($this->role->name == 'Admin' && $this->is_verified == 1 && $this->activation_token == null && $this->is_login = '1' && $this->is_active = '1'){
            return true;
        }
        return false;
    }

    public function isBureau(){ // BAA, BMA, Library, etc
        if ($this->role->name == 'Bureau' && $this->is_verified == 1 && $this->activation_token == null && $this->is_login = '1' && $this->is_active = '1'){
            return true;
        }
        return false;
    }
}
