<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IndividualOrder extends Model
{
    protected $fillable = ['status', 'mode_of_payment', 'expected_amount'];
    //table name
    protected $table = 'individual_orders';
    //primary key
    public $primaryKey = 'io_id';
    //timestamps
    public $timestamps = true;


    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
