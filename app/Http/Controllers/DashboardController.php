<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\BuyersofCrop;
use App\Charts\prodChart;
use App\cropSalesChart;
use App\farmerTotalQty;
use App\farmerChart;
use App\DashboardProfit;
use App\Order;
use App\IndividualOrder;
use App\DeliverySchedule;
use DB;
use Carbon\Carbon;
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
        if (!Gate::allows('isFarmer')) {
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

        $dt = Carbon::now();
        return view('dashboard')
        
        ->with('dt', $dt)
            ->with('buyers', $user->BuyersofCrop)
            ->with('posts', $user->posts);
    }
    public function getOrdersConfirmation()
    {
        $orders = Order::orderBy('created_at')->get();
        $orders->transform(function ($order, $key) {
            $order->orders_reservation = unserialize($order->orders_reservation);
            return $order;
        });
        // $buyersinfo = Order::where($order->orders_reservation->posts['item']['user_id'],  $current_user_id)->get();
        $current_user_id = auth()->user()->id;
        //$orders_of_buyer = IndividualOrder::where('buyers_id', $current_user_id)->get();
        $orders_to_confirm = IndividualOrder::where('user_id', $current_user_id)->get();
        return view('users/orders-dashboard', ['orders' => $orders])
            ->with('orders_to_confirm', $orders_to_confirm);
    }


    private static function smsgateway($phone, $message)
    {


        $array_fields['phone_number'] = $phone;

        $array_fields['message'] = $message;

        $array_fields['device_id'] = 116705;

        //$array_fields['device_id'] = 110460;

        $token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJhZG1pbiIsImlhdCI6MTU4Njg4ODI5MiwiZXhwIjo0MTAyNDQ0ODAwLCJ1aWQiOjc5MzUxLCJyb2xlcyI6WyJST0xFX1VTRVIiXX0.39zv2kxgafe6MjVor4UA-gjKYa8G_KihJTIxZOeiess";

        //       $token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJhZG1pbiIsImlhdCI6MTU1MzY3OTM1MSwiZXhwIjo0MTAyNDQ0ODAwLCJ1aWQiOjY5NTM0LCJyb2xlcyI6WyJST0xFX1VTRVIiXX0.jVJXqJFhLuAXP3Jgc4kIz1jteChBcgvVdORKK3mn9IQ";

        //$token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJhZG1pbiIsImlhdCI6MTU1Mzk2MTYzNywiZXhwIjo0MTAyNDQ0ODAwLCJ1aWQiOjYwOTQwLCJyb2xlcyI6WyJST0xFX1VTRVIiXX0.Ci7Pt7jTerxqDco_9UcQFOfGmRYr3N4-gwXC-oIJPDc";


        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://smsgateway.me/api/v4/message/send",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "[  " . json_encode($array_fields) . "]",
            CURLOPT_HTTPHEADER => array(
                "authorization: $token",
                "cache-control: no-cache"
            ),
        ));
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        //        if ($err) {
        //            echo "cURL Error #:" . $err;
        //        } else {
        //            echo $response;
        //        }


    }


    public function prodStat()
    {
        
        $data['year_list'] = $this->fetch_year();

        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $profit = DashboardProfit::where('user_id', $user_id)->get();

        //crop profitability ranking

        //Crop Availability
        $totalQty = farmerTotalQty::where('user_id', $user_id)
            ->pluck('sumcropqty', 'crop_name');

        //Crop Sales Kilogram
        $salesKg = farmerChart::where('user_id', $user_id)
            ->pluck('totalkgsold', 'crop_name');

        //Crops Fixed Quantity
        $salesFixedQuantity = farmerChart::where('user_id', $user_id)
            ->pluck('totalfixedqty', 'crop_name');


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
        // // ->backgroundColor('grey');
        // $chart->dataset('Crops Fixed Quantity', 'bubble', $salesFixedQuantity->values())

        $chart->dataset('Crop Sales Kilogram', 'line', $salesKg->values())
        ->backgroundColor('red');


        return view('users/prod-statistics')
        ->with($data)
            ->with('buyers', $user->BuyersofCrop)
            ->with('chart', $chart)
            ->with('profits', $profit)
            ->with('posts', $user->posts);
    }
    
    // whereYear('created_at', '=', $year)
    // ->whereMonth('created_at', '=', $month)
    // // ->get()

    public function fetch_year() {

        $data = IndividualOrder::where('user_id', auth()->user()->id)->groupBy('updated_at')->orderBy('updated_at', 'ASC')->get();
        return $data;
    }

    // public function fetch_data(Request $request) {
    //     if($request->input('year'))
    //     {

    //      $chart_data = $this->fetch_chart_data($request->input('year'));
   
    //      foreach($chart_data->toArray() as $row)
    //      {
       
    //       $output[] = array(
    //        'month'  => $row->month,
    //        'profit' => floatval($row->profit)
    //       );
    //      }
     
    //      echo json_encode($output);
    //     }
    // }

    // function fetch_chart_data($year)
    // {
    //  $data = IndividualOrder::where('user_id', auth()->user()->id)->groupBy('updated_at')->orderBy('updated_at', 'ASC')->get();
    //  return $data;
    // }

    public function getConfirmedOrders(Request $request, $conf_id)
    {
        if (!Gate::allows('isFarmer')) {
            abort(404, 'Sorry, the page you are looking for could not be found');
        }

        $this->validate($request, [
            'expected_del_date' => 'required'

        ]);



        $delsched = DeliverySchedule::find($conf_id);
        $delsched->expected_del_date = $request->input('expected_del_date');

         $delsched->save();

        $indi_order = IndividualOrder::find($conf_id);
        $buyer_no = $indi_order->orders_mobile_no;
        $crop_name = $indi_order->crop_name;
        $indi_order->status = "Confirmed";
        $buyer_no = $indi_order->orders_mobile_no;
        DashboardController::smsgateway($buyer_no, "Hi There, your order - " . $indi_order->qty . " KG - " . $indi_order->crop_name . " with a Total Price of " . $indi_order->price . " has been CONFIRMED. Thank You! [CROPLOOK SMS NOTIFICATION]");

        $indi_order->save();



        $current_user_id = auth()->user()->id;
        $orders_to_confirm = IndividualOrder::where('user_id', $current_user_id)->get();


        return redirect()->route('users.orders-dashboard')
            ->with('success', 'Order Confirmed!')
            ->with('orders_to_confirm', $orders_to_confirm);
    }
    public function getDeclinedOrders($decl_id)
    {
        if (!Gate::allows('isFarmer')) {
            abort(404, 'Sorry, the page you are looking for could not be found');
        }


        $indi_order = IndividualOrder::find($decl_id);
        $indi_order->status = "Declined";
        $buyer_no = $indi_order->orders_number_no;
        $crop_name = $indi_order->crop_name;
        $indi_order->save();

        $buyer_no = $indi_order->orders_mobile_no;
        DashboardController::smsgateway($buyer_no, "Hi There, your order - " . $indi_order->qty . " KG - " . $indi_order->crop_name . " with a Total Price of " . $indi_order->price . " has been DECLINED. Thank You! [CROPLOOK SMS NOTIFICATION]");

        // $product = Post::find($indi_order->id);
        // $old_quantity = (int) $product->crop_quantity;
        //     $kilo_sold = (int) $product->kilogram_sold;
        //     $add_quantity = (int) $indi_order->qty;
        //     $total_price = (int) $product->crop_price * $add_quantity;
        //     $cancelled = $add_quantity;
        //     $total = ($old_quantity + $add_quantity);

        //     $pc = (int) $product->production_cost;
        //     $earn = (int) $product->earnings;

        //     $earning = new Earning();
        //     $earning->crop_id = $id;
        //     $earning->farmer_id = $product->user_id;
        //     $earning->buyer_id = Auth()->user()->id;
        //     $earning->kilogram_sold =  $sold;

        //     $earning->fixed_quantity = (int) $earning->kilogram_sold + $old_quantity;
        //     $earning->earnings = (int) $earning->earnings + $total;
        //     $earning->percentage_sold_before_harvest = (int) $earning->kilogram_sold + $sold / (int) $earning->fixed_quantity * 100;
        //     $earning->save();

        //     $product->update(['crop_quantity' => $total]);

        //     $total_sold = $old_quantity + $sold;
        //     $product->update(['kilogram_sold' => $kilo_sold + $sold]);
        //     $product->update(['fixed_quantity' => (int) $product->kilogram_sold + (int) $product->crop_quantity]);
        //     $product->update(['earnings' => (int) $product->earnings + $total_price]);
        //     $product->update(['crop_profitability' => (int) $product->earnings - (int) $product->production_cost]);
        //     $product->update(['percentage_sold_before_harvest' => round((int) $product->kilogram_sold / $product->fixed_quantity * 100, 1)]);
        // }

        $current_user_id = auth()->user()->id;
        $orders_to_confirm = IndividualOrder::where('user_id', $current_user_id)->get();
        return redirect()->route('users.orders-dashboard')
            ->with('success', 'Order Declined!')
            ->with('orders_to_confirm', $orders_to_confirm);
    }

    public function getDeliveredOrder($deli_id)
    {
        if (!Gate::allows('isFarmer')) {
            abort(404, 'Sorry, the page you are looking for could not be found');
        }
        $indi_order = IndividualOrder::find($deli_id);
        $indi_order->status = "Delivered";

        $buyer_no = $indi_order->orders_mobile_no;
        DashboardController::smsgateway($buyer_no, "Hi There, your order - " . $indi_order->qty . " KG - " . $indi_order->crop_name . " with a Total Price of " . $indi_order->price . " has been DELIVERED. Thank You! [CROPLOOK SMS NOTIFICATION]");

        $indi_order->save();

        $current_user_id = auth()->user()->id;
        $orders_to_confirm = IndividualOrder::where('user_id', $current_user_id)->get();

        return redirect()->route('users.orders-dashboard')
            ->with('success', 'Order Delivered!')
            ->with('orders_to_confirm', $orders_to_confirm);;
    }
    public function getCompletedTransaction()
    {
        if (!Gate::allows('isFarmer')) {
            abort(404, 'Sorry, the page you are looking for could not be found');
        }


        $current_user_id = auth()->user()->id;
        $alltrans = IndividualOrder::where('user_id', $current_user_id)->get();

        return view('users/completed-transactions')
            ->with('alltrans', $alltrans);
    }
}
