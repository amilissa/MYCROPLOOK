<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\BuyersofCrop;
use App\Charts\prodChart;
use App\cropSalesChart;
use App\farmerTotalQty;
use App\farmerChart;
use App\userProfiles;
use App\DashboardProfit;
use App\Order;
use App\IndividualOrder;
use DB;
use Charts;
use Gate;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');


    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(!Gate::allows('isFarmer')){
            abort(404, 'Sorry, the page you are looking for could not be found');
        }
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        // $posts = $user->posts;
        // if(count($posts) > 0){
        //     foreach($posts as $post){
        //         //crop profitability
        //         $cp =

        
        //     }
        // }

        return view('dashboard')
        ->with('buyers', $user->BuyersofCrop)
        ->with('posts', $user->posts);

}
public function getOrdersConfirmation()
{
    $orders = Order::orderBy('created_at')->get();
    $orders->transform(function($order, $key){
        $order->orders_reservation = unserialize($order->orders_reservation);
        return $order;
    });
    // $buyersinfo = Order::where($order->orders_reservation->posts['item']['user_id'],  $current_user_id)->get();
    $current_user_id = auth()->user()->id;
    //$orders_of_buyer = IndividualOrder::where('buyers_id', $current_user_id)->get();
    $orders_to_confirm = IndividualOrder::where('user_id', $current_user_id)->get();
    return view('users/orders-dashboard', ['orders'=> $orders])
    ->with('orders_to_confirm', $orders_to_confirm);
}

public function prodStat()
{
    $user_id = auth()->user()->id;
    $user = User::find($user_id);
    $profit = DashboardProfit::where('user_id', $user_id)->get();

    //crop profitability ranking

    //Crop Availability
    $totalQty = farmerTotalQty::where('user_id', $user_id)
    ->pluck('sumCropQty','crop_name');

    //Crop Sales Kilogram
    $salesKg = farmerChart::where('user_id', $user_id)
    ->pluck('totalKgSold','crop_name');

    //Crops Fixed Quantity
    $salesFixedQuantity = farmerChart::where('user_id', $user_id)
    ->pluck('totalFixedQty','crop_name');


    $chart = new prodChart;
    $chart->labels($totalQty->keys())->options([
        'legend' => [
            'display' => true,
            'position' => 'top',
            'fullWidth' => true,
            'align' => 'start'
            ]
        ]);
    $chart->dataset('Crop Availability', 'bar', $totalQty->values())
    ->backgroundColor('green');
    // $chart->dataset('Crops Average Price', 'line', $totalPrice->values())
    // ->backgroundColor('grey');
    $chart->dataset('Crops Fixed Quantity', 'bubble', $salesFixedQuantity->values())
    ->backgroundColor('red');
    $chart->dataset('Crop Sales Kilogram', 'line', $salesKg->values())
    ->backgroundColor('grey');


    return view('users/prod-statistics')
    ->with('buyers', $user->BuyersofCrop)
    ->with('chart', $chart)
    ->with('profits', $profit)
    ->with('posts', $user->posts);
}


public function getConfirmedOrders($conf_id)
{
    if(!Gate::allows('isFarmer')){
        abort(404, 'Sorry, the page you are looking for could not be found');
    }
    $indi_order = IndividualOrder::find($conf_id);
    $indi_order->status = "isConfirmed";
                
    $indi_order->save();

    $current_user_id = auth()->user()->id;
    $orders_to_confirm = IndividualOrder::where('user_id', $current_user_id)->get();

    return redirect()->route('users.orders-dashboard')
    ->with('success', 'Order Confirmed!')
    ->with('orders_to_confirm', $orders_to_confirm);
}
public function getDeclinedOrders($decl_id)
{
    if(!Gate::allows('isFarmer')){
        abort(404, 'Sorry, the page you are looking for could not be found');
    }
    $indi_order = IndividualOrder::find($decl_id);
    $indi_order->status = "isDeclined";
    
    $indi_order->save();
    
    $current_user_id = auth()->user()->id;
    $orders_to_confirm = IndividualOrder::where('user_id', $current_user_id)->get();
    return redirect()->route('users.orders-dashboard')
    ->with('success', 'Order Declined!')
->with('orders_to_confirm', $orders_to_confirm);;
}

public function getDeliveredOrder($deli_id)
{
    if(!Gate::allows('isFarmer')){
        abort(404, 'Sorry, the page you are looking for could not be found');
    }
    $indi_order = IndividualOrder::find($deli_id);
    $indi_order->status = "isDelivered";
    
    $indi_order->save();
    
    $current_user_id = auth()->user()->id;
    $orders_to_confirm = IndividualOrder::where('user_id', $current_user_id)->get();
    return redirect()->route('users.orders-dashboard')
    ->with('success', 'Order Delivered!')
->with('orders_to_confirm', $orders_to_confirm);;
}
public function getCompletedTransaction()
{
    if(!Gate::allows('isFarmer')){
        abort(404, 'Sorry, the page you are looking for could not be found');
    }
 
    
    $current_user_id = auth()->user()->id;
    $alltrans = IndividualOrder::where('user_id', $current_user_id)->get();
    return view('users/completed-transactions')
->with('alltrans', $alltrans);
}

}
