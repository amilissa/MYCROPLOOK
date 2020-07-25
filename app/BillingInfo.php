<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillingInfo extends Model
{
    protected $fillable = ['user_id'];
    //table name
    protected $table = 'billing_info';
    //primary key
    public $primaryKey = 'bil_id';
    //timestamps
    public $timestamps = false;


    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
