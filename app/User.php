<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'middle_name', 'last_name', 'register_as', 'mobile_no', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts()
    {
        return $this->hasMany('App\Post');
    }
    public function userProfile()
    {
        return $this->hasMany('App\userProfile');
    }


    public function Land()
    {
        return $this->hasMany('App\Land');
    }
    public function BillingInfo()
    {
        return $this->hasMany('App\BillingInfo');
    }
    public function DeliveryInfo()
    {
        return $this->hasMany('App\DeliveryInfo');
    }
    public function PostandFarmer()
    {
        return $this->hasMany('App\PostandFarmer');
    }
    public function farmProducts()
    {
        return $this->hasMany('App\farmProducts');
    }
    public function orders()
    {
        return $this->hasMany('App\Order');
    }
    public function reservations()
    {
        return $this->hasMany('App\Reservation');
    }
    public function totalChart()
    {
        return $this->hasMany('App\totalChart');
    }
    public function Earning()
    {
        return $this->hasMany('App\Earning');
    }

    public function BuyersofCrop()
    {
        return $this->hasMany('App\BuyersofCrop');
    }
    public function cropSalesChart()
    {
        return $this->hasMany('App\cropSalesChart');
    }
    public function cropSalesChart2()
    {
        return $this->hasMany('App\cropSalesChart');
    }
    public function farmerChart()
    {
        return $this->hasMany('App\farmerChart');
    }
    public function farmerTotalQty()
    {
        return $this->hasMany('App\farmerTotalQty');
    }
    public function postsUP()
    {
        return $this->hasMany('App\postUP');
    }
    public function Profile()
    {
        return $this->hasMany('App\Profile');
    }
    public function CropList()
    {
        return $this->hasMany('App\CropList');
    }
    public function individual_orders()
    {
        return $this->hasMany('App\IndividualOrder');
    }
    public function DashboardProfit()
    {
        return $this->hasMany('App\DashboardProfit');
    }
    public function OrderConfirmation()
    {
        return $this->hasMany('App\OrderConfirmation');
    }
}
