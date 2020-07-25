<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\userProfile;
use App\Post;
use App\postsUP;
use App\User;
use App\Lands;
use App\BillingInfo;
use App\Reservation;
use App\Order;
use App\IndividualOrder;
use Gate;
use SebastianBergmann\Environment\Console;

class MyAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $current_user_id = auth()->user()->id;
        $user_profile = User::where('id', $current_user_id)->get();
        return view('users.user-profile')->with('user_profile', $user_profile);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function createprofile()
    {
        $current_user_id = auth()->user()->id;
        $user_profile = User::where('id', $current_user_id)->get();
        return view('users.create-profile')->with('user_profile', $user_profile);
    }

    public function show($id)
    {
        $current_user_id = auth()->user()->id;
        $user_profile = User::where('id', $current_user_id)->get();
        return view('users.profile-info')->with('user_profile', $user_profile);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $current_user_id = auth()->user()->id;
        $user_profile = User::where('id', $current_user_id)->get();
        //
        // //handle file upload
        // if ($request->hasFile('userImage')) {
        //     //get the filename with the extension
        //     $filenameWithExt = $request->file('userImage')->getClientOriginalName();
        //     //get just filename
        //     $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        //     //get just extension
        //     $extension = $request->file('userImage')->getClientOriginalExtension();
        //     $filenameToStore = $filename . '_' . time() . '.' . $extension;
        //     // upload image
        //     $path = $request->file('userImage')->storeAs('public/uploads/userImage/', $filenameToStore);
        // } else {
        //     $filenameToStore = "no-image.jpg";
        // }

        $this->validate($request, [
            'firstName' => 'required',
            'middleName' => 'required',
            'lastName' => 'required',
            'mobileNumber' => 'required',
            'emailAddress' => 'required'

        ]);

        //update user
        $user_profile = User::find($id);
        $user_profile->first_name = $request->input('firstName');
        $user_profile->middle_name = $request->input('middleName');
        $user_profile->last_name = $request->input('lastName');
        $user_profile->mobile_no = $request->input('mobileNumber');
        $user_profile->email = $request->input('emailAddress');
        $user_profile->save();

        return redirect('/users/user-profile')
            ->with('success', 'User Profile Updated!')
            ->with('user_profile', $user_profile);
    }

    public function getProfileInfo()
    {
        $current_user_id = auth()->user()->id;
        $user_profile = User::where('id', $current_user_id)->get();
        return view('users.profile-info')->with('user_profile', $user_profile);
    }

    public function getDeliveryAddress()
    {
        $current_user_id = auth()->user()->id;
        $user_profile = User::where('id', $current_user_id)->get();
        return view('users.delivery-info')->with('user_profile', $user_profile);
    }

    public function getBillingAddress()
    {
        $current_user_id = auth()->user()->id;
        $user_profile = BillingInfo::where('user_id', $current_user_id)->get();
        return view('users.billing-info')->with('user_profile', $user_profile);
    }

    public function updateBillingInfo(Request $request, $bil_id)
    {

        $current_user_id = auth()->user()->id;
        $user_profile = User::where('id', $current_user_id)->get();


        $this->validate($request, [
            'bil_address' => 'required',
            'bil_brgy' => 'required',
            'bil_city' => 'required',
            'bil_province' => 'required',
            'bil_zipcode' => 'required',
            'bil_country' => 'required',
            'bil_others' => 'required'
        ]);

        //update user
        $billing = BillingInfo::find($bil_id);
        $billing->bil_address = $request->input('bil_address');
        $billing->bil_brgy = $request->input('bil_brgy');
        $billing->bil_city = $request->input('bil_city');
        $billing->bil_province = $request->input('bil_province');
        $billing->bil_zipcode = $request->input('bil_zipcode');
        $billing->bil_country = $request->input('bil_country');
        $billing->bil_others = $request->input('bil_others');
        $billing->save();

        return redirect('/users/user-profile')
            ->with('success', 'User Profile Updated!')
            ->with('user_profile', $user_profile);
    }


    public function getOrderHistory()
    {
        $current_user_id = auth()->user()->id;
        $user_profile = User::where('id', $current_user_id)->get();
        return view('users.order-history')->with('user_profile', $user_profile);
    }

    //////////////// my orders naaaa ///////////////////////////

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



    public function myOrders()
    {
        if (!Gate::allows('isBuyer')) {
            abort(404, 'Sorry, the page you are looking for could not be found');
        }
        $orders = Auth::user()->orders;
        $orders->transform(function ($order, $key) {
            $order->orders_reservation = unserialize($order->orders_reservation);
            return $order;
        });
        $current_user_id = auth()->user()->id;
        $orders_to_confirm = IndividualOrder::where('buyers_id', $current_user_id)->get();


        $fs_info = postsUP::groupBy('id')->get();
        $user_profile = User::where('id', $current_user_id)->get();
        return view('users.my-orders', ['orders' => $orders])
            ->with('farmers_info', $fs_info)
            ->with('orders_to_confirm', $orders_to_confirm);
    }
    public function getCancelledOrders($canc_id)
    {
        if (!Gate::allows('isBuyer')) {
            abort(404, 'Sorry, the page you are looking for could not be found');
        }
        $indi_order = IndividualOrder::find($canc_id);
        $indi_order->status = "isCancelled";

        $indi_order->save();

        $current_user_id = auth()->user()->id;
        $orders_to_confirm = IndividualOrder::where('user_id', $current_user_id)->get();
        return redirect()->route('myorders')
            ->with('success', 'Order Cancelled!')
            ->with('orders_to_confirm', $orders_to_confirm);
    }
    public function getReceivedOrders($rece_id)
    {
        if (!Gate::allows('isBuyer')) {
            abort(404, 'Sorry, the page you are looking for could not be found');
        }
        $indi_order = IndividualOrder::find($rece_id);
        $indi_order->status = "isReceived";

        $indi_order->save();

        $current_user_id = auth()->user()->id;
        $orders_to_confirm = IndividualOrder::where('user_id', $current_user_id)->get();
        return redirect()->route('myorders')
            ->with('success', 'Order Received!')
            ->with('orders_to_confirm', $orders_to_confirm);
    }
    public function getReportOrders($repo_id)
    {
        if (!Gate::allows('isBuyer')) {
            abort(404, 'Sorry, the page you are looking for could not be found');
        }
        $indi_order = IndividualOrder::find($repo_id);
        $indi_order->status = "isReported";

        $indi_order->save();

        $current_user_id = auth()->user()->id;
        $orders_to_confirm = IndividualOrder::where('user_id', $current_user_id)->get();
        return redirect()->route('myorders')
            ->with('success', 'Order Reported!')
            ->with('orders_to_confirm', $orders_to_confirm);
    }
    public function getCompletedTransactionsOfBuyer()
    {
        if (!Gate::allows('isBuyer')) {
            abort(404, 'Sorry, the page you are looking for could not be found');
        }

        $current_user_id = auth()->user()->id;
        $fs_info = postsUP::groupBy('id')->get();
        $alltranss = IndividualOrder::where('buyers_id', $current_user_id)->get();
        return view('users/completed-transactions-for-buyers')
            ->with('farmers_info', $fs_info)
            ->with('alltranss', $alltranss);
    }




    public function getUserInvoice($orders_id)
    {
        if (!Gate::allows('isBuyer')) {
            abort(404, 'Sorry, the page you are looking for could not be found');
        }

        $postInfo = Post::find($orders_id);
        $postId = $postInfo->id;
        $farmerInfo = postsUP::where('user_id', $postInfo->user_id)->groupBy('id')->get();
        $orders = Auth::user()->orders;
        $orders->transform(function ($order, $key) {
            $order->orders_reservation = unserialize($order->orders_reservation);
            return $order;
        });
        $current_user_id = auth()->user()->id;
        $fs_info = postsUP::groupBy('id')->get();
        $user_profile = User::where('id', $current_user_id)->get();
        return view('users.user-invoice', ['orders' => $orders])
            ->with('farmerInfo', $farmerInfo)
            ->with('postInfo', $postInfo)
            ->with('postId', $postId)
            ->with('user_profile', $user_profile);
    }
    public function messages()
    {
        return view('/chat');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
