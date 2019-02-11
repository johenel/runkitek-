<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'users';
    protected $hidden = ['password'];

    public function details()
    {
    	return $this->hasOne('App\Models\UserDetails');
    }

    public function transactions()
    {
    	return $this->hasOne('App\Models\Transactions');
    }
}
