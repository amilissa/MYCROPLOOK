<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable = ['crop_quantity', 'kilogram_sold', 'percentage_sold_before_harvest', 'fixed_quantity','earnings'];
    //table name
    protected $table = 'posts';
    //primary key
    public $primaryKey = 'id';
    //timestamps
    public $timestamps = true;


public function user(){
    return $this->belongsTo('App\User');
}
}
