<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cropSalesChart2 extends Model
{
     //table name
    protected $table = 'chart_sales2';
    //primary key
    public $primaryKey = 'id';
    //timestamps
    public $timestamps = true;


public function user(){
    return $this->belongsTo('App\User');
}
}
