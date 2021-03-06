<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TopUp extends Model
{
    protected $fillable = [
        'user_id', 'amount', 'admin_id', 'description', 'is_claimed'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function admin(){
        return $this->belongsTo('App\User', 'admin_id', 'id');
    }
}
