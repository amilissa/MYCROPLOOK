<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\BillingInfo;
use App\DeliveryInfo;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'register_as' => ['required', 'string', 'max:10'],
            'name' => ['required', 'string', 'max:255'],
            'first_name' => ['string', 'max:255'],
            'middle_name' => ['string', 'max:255'],
            'last_name' => ['string', 'max:255'],
            'show_user' => ['string', 'max:255'],
            'mobile_no' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'terms' => ['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    // public function getFullname()
    // {
    //     return $this->first_name . ' ' . $this->middle_name . ' ' . $this->last_name;
    // }

    protected function create(array $data)
    {




        $splitName = explode(' ', $data['name'], 2); // Restricts it to only 2 values, for names like Billy Bob Jones

        $first_name = $splitName[0];
        $last_name = !empty($splitName[1]) ? $splitName[1] : '';

        $user = User::create([
            'register_as' => $data['register_as'],
            'first_name' => $first_name,
            'last_name' => $last_name,
            'mobile_no' => $data['mobile_no'],
            'show_user' => "Approved",
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'terms' => $data['terms'],
        ]);
        BillingInfo::create([
            'user_id' => $user->id
        ]);

        DeliveryInfo::create([
            'user_id' => $user->id
        ]);

        return $user;
    }
}
