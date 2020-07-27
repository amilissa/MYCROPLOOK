<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeliverySchedule extends Model
{
    protected $fillable = ['io_id', 'expected_del_date', 'buyer_id'];
    //table name
    protected $table = 'delivery_schedule';
    //primary key
    public $primaryKey = 'io_id';
    //timestamps
    public $timestamps = true;


    public function user()
    {
        return $this->belongsTo('App\User');


}
}
