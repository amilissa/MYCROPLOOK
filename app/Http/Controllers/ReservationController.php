<?php

namespace App\Http\Controllers;

use App\DeliveryInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\User;
use Carbon\Carbon;
use App\Earning;
use App\postsUP;
use App\PostandFarmer;
use App\DeliverySchedule;
use App\userProfiles;
use App\IndividualOrder;
use App\Order;
use App\Reservation;
use App\OrderConfirmation;
use Session;


class ReservationController extends Controller
{
    public function startReservation(Request $request, $id)
    {
        //dungagan pani diriii
        $post = Post::find($id);
        $oldReservation = Session::has('reservation') ? Session::get('reservation') : null;
        $reservation = new Reservation($oldReservation);
        $reservation->add($post, $post->id);

        //dd($reservation);
        $request->session()->put('reservation', $reservation);
        //dd($request->session()->get('reservation'));
        return redirect('/explore-products')->with('success', 'Successfully Reserved a Crop! Go to My Reservations tab to continue.');
    }

    public function getReservations()
    {
        if (!Session::has('reservation')) {
            return view('reservation.my-reservations');
        }
        $oldReservation = Session::get('reservation');
        $reservation = new Reservation($oldReservation);
        return view('reservation.my-reservations', ['posts' => $reservation->posts, 'totalPrice' => $reservation->totalPrice]);
    }

    // public function getReservationsNavbar(){
    //     if (!Session::has('reservation')){
    //         return view('reservation.my-reservations');
    //     }
    //     $oldReservation = Session::get('reservation');
    //     $reservation = new Reservation($oldReservation);
    //     $posts = $reservation->posts;
    //     $totalPrice = $reservation->totalPrice;
    //     return $totalPrice;

    // }

    public function getReduceByOne($id)
    {
        $oldReservation = Session::has('reservation') ? Session::get('reservation') : null;
        $reservation = new Reservation($oldReservation);
        $reservation->reduceByOne($id);

        if (count($reservation->posts) > 0) {
            Session::put('reservation', $reservation);
        } else {
            Session::forget('reservation');
        }
        return redirect()->route('reservation.reservationCart');
    }

    public function getAddByOne($id)
    {
        $oldReservation = Session::has('reservation') ? Session::get('reservation') : null;
        $reservation = new Reservation($oldReservation);
        $reservation->addByOne($id);

        if (count($reservation->posts) > 0) {
            Session::put('reservation', $reservation);
        } else {
            Session::forget('reservation');
        }
        return redirect()->route('reservation.reservationCart');
    }

    public function getRemoveItem($id)
    {
        $oldReservation = Session::has('reservation') ? Session::get('reservation') : null;
        $reservation = new Reservation($oldReservation);
        $reservation->removeItem($id);

        if (count($reservation->posts) > 0) {
            Session::put('reservation', $reservation);
        } else {
            Session::forget('reservation');
        }

        return redirect()->route('reservation.reservationCart');
    }

    public function getCheckout()
    {
        if (!Session::has('reservation')) {
            return view('reservation.my-reservations');
        }

        $current_user_id = auth()->user()->id;
        $user_profile = User::where('id', $current_user_id)->get();
        $user_delivery = DeliveryInfo::where('user_id', $current_user_id)->get();

        $oldReservation = Session::get('reservation');
        $reservation = new Reservation($oldReservation);

        $total = $reservation->totalPrice;
        return view('reservation.checkout', [
            'total' => $total, 'posts' => $reservation->posts,
            'user_profile' => $user_profile,  'user_delivery' => $user_delivery
        ]);
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
    public function postCheckout(Request $request)
    {
        if (!Session::has('reservation')) {
            return view('reservation.my-reservations');
        }
        if ($this->productNoLongerAvailable()) {
            return back()->with('error', 'Sorry, One of the Crops in your Cart is no Longer Available!');
        }
        $current_user_id = auth()->user()->id;
        $oldReservation = Session::get('reservation');
        $reservation = new Reservation($oldReservation);
        $order = new Order();
        $order->orders_reservation = serialize($reservation);
        $order->orders_buyer_name = $request->input('fullName');
        $order->orders_address = $request->input('completeAddress');
        $order->orders_mobile_no = $request->input('mobile_no');
        $order->orders_farmer_id = $request->input('mobile_no');


        Auth::user()->orders()->save($order);

        foreach ($reservation->posts as $id => $value) {

            $myOrders = Order::where('user_id', '=', Auth::user()->id)->orderBy('created_at', 'DESC')->take(1)->get();

            $dt = new Carbon();
            $product = Post::find($id);
            $indi_order = new IndividualOrder();
            $indi_order->orders_id = $myOrders->first()->orders_id;
            $indi_order->qty = (int) $value['qty'];
            $indi_order->price = (int) $value['price'];
            $indi_order->id = $product->id;
            $indi_order->buyers_id = Auth::user()->id;
            $indi_order->crop_name = $product->crop_name;
            $indi_order->crop_price = $product->crop_price;
            $indi_order->crop_quantity  = $product->crop_quantity;
            $indi_order->orders_buyer_name = $order->orders_buyer_name;
            $indi_order->orders_address = $order->orders_address;
            $indi_order->orders_mobile_no = $order->orders_mobile_no;
            $indi_order->orders_created_at = $myOrders->first()->created_at;
            $indi_order->orders_updated_at = $myOrders->first()->updated_at;
            $indi_order->user_id = $product->user_id;
            $indi_order->crop_image = $product->crop_image;
            $indi_order->order_month = $dt->month;
            $indi_order->order_day = $dt->day;
            $indi_order->order_year = $dt->year;
            $indi_order->startHarvestMonth = $product->startHarvestMonth;
            $indi_order->startHarvestDay = $product->startHarvestDay;
            $indi_order->startHarvestYear = $product->startHarvestYear;
            $indi_order->endHarvestMonth = $product->endHarvestMonth;
            $indi_order->endHarvestDay = $product->endHarvestDay;
            $indi_order->endHarvestYear = $product->endHarvestYear;
            $indi_order->mode_of_payment = $request->input('ModeOfPayment');
            $indi_order->expected_amount = $request->input('ExpectedPaymentAmount');
            $indi_order->status = "Pending";
            $indi_order->save();

            // alternative ani, kay what if mag sabay? (latest)
            $forDS = IndividualOrder::latest('created_at')->first();


            DeliverySchedule::create([
                'io_id' => $forDS->io_id,
                'buyer_id' => $current_user_id
            ]);

            $buyer_sms = User::where('id', $product->user_id)->get();
            $result = $buyer_sms->first();
            $number = $result['mobile_no'];
            $firstname = $result['first_name'];
            $middlename = $result['middle_name'];
            $lastname = $result['last_name'];
            ReservationController::smsgateway($number, "Hi there " . $firstname . " " . $middlename . " " . $lastname . ", a customer has ordered a quantity of " . $value['qty'] . " - " . $product->crop_name . " from you. You can check them out in the -Dashboard>Order Status- in our website. Thank You! [CROPLOOK SMS NOTIFICATION]");


            $old_quantity = (int) $product->crop_quantity;
            $kilo_sold = (int) $product->kilogram_sold;
            $less_quantity = (int) $value['qty'];
            $total_price = (int) $product->crop_price * $less_quantity;
            $sold = $less_quantity;
            $total = ($old_quantity - $less_quantity);

            $pc = (int) $product->production_cost;
            $earn = (int) $product->earnings;


            $earning = new Earning();
            $earning->crop_id = $id;
            $earning->farmer_id = $product->user_id;
            $earning->buyer_id = Auth()->user()->id;
            $earning->kilogram_sold =  $sold;

            $earning->fixed_quantity = (int) $earning->kilogram_sold + $old_quantity;
            $earning->earnings = (int) $earning->earnings + $total;
            $earning->percentage_sold_before_harvest = (int) $earning->kilogram_sold + $sold / (int) $earning->fixed_quantity * 100;
            $earning->save();

            $product->update(['crop_quantity' => $total]);

            $total_sold = $old_quantity + $sold;
            $product->update(['kilogram_sold' => $kilo_sold + $sold]);
            $product->update(['fixed_quantity' => (int) $product->kilogram_sold + (int) $product->crop_quantity]);
            $product->update(['earnings' => (int) $product->earnings + $total_price]);
            $product->update(['crop_profitability' => (int) $product->earnings - (int) $product->production_cost]);
            $product->update(['percentage_sold_before_harvest' => round((int) $product->kilogram_sold / $product->fixed_quantity * 100, 1)]);
        }

        ReservationController::smsgateway($request->input('mobile_no'), "Hi " . $request->input('fullName') . ", thank you for your order/s! You can check your orders on -My orders- tab in the website. Thank You! [CROPLOOK SMS NOTIFICATION]");

        Session::forget('reservation');
        return redirect()->route('explore-products.index')->with('success', 'Successfully Purchased Crops!');
    }

    public function productNoLongerAvailable()
    {
        $oldReservation = Session::get('reservation');
        $reservation = new Reservation($oldReservation);

        foreach ($reservation->posts as $id => $value) {
            //dd($id);
            $product = Post::find($id);
            $old_quantity = (int) $product->crop_quantity;
            $less_quantity = (int) $value['qty'];

            if ($old_quantity < $less_quantity) {
                return true;
            }
        }
        return false;
    }

    // $orders->transform(function($order, $key){
    //     $order->orders_reservation = unserialize($order->orders_reservation);
    // return $order;
    // });

    // foreach ($order as $post){
    //     $product = Post::find($post['item']);
    //      dd($post['item']);
    //     $product->update(['crop_quantity' -> $product->crop_quantity - $item->qty]);
    // }
    // $oldReservation = Session::get('reservation');
    // $reservation = new Reservation($oldReservation);
    //dd($reservation);
    //   foreach ($reservation as $post){
    // $product = Post::find($post[id]);
    //dd($post);
    // $product->update(['crop_quantity' -> $product->crop_quantity - $item->qty]);



}
