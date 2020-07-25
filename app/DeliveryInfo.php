<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeliveryInfo extends Model
{

    protected $fillable = ['user_id'];
    //table name
    protected $table = 'delivery_info';
    //primary key
    public $primaryKey = 'del_id';
    //timestamps
    public $timestamps = false;


    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
