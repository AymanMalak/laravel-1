<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

    protected $fillable =[ 'name','desc','deadline','assign_admin','status','user_id'];
    function user(){
        return $this->belongsTo('App\User');
    }
}
