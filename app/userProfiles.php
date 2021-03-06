<?php

namespace App;

use App\User;


use Illuminate\Database\Eloquent\Model;

class userProfiles extends Model
{
    //table name
    protected $table = 'users';
    //primary key
    public $primaryKey = 'id';
    //timestamps
    public $timestamps = true;


    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
