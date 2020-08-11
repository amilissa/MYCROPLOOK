<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Lands;
use App\Post;
use App\farmProfile;
use App\PostandFarmer;
use App\farmProducts;
use Carbon\Carbon;
use Session;
use DB;

class ExploreFarmsController extends Controller
{
    public function index()
    {


        $farms = Lands::orderBy('name_of_company','desc')->paginate(6);
        return view('explore-farms.index')->with('farms', $farms);

    }

    public function search(Request $request){
        $search = $request->get('search');
        $farms = Lands::where('crop_name', 'LIKE', '%'.$search.'%')->paginate(6);
        return view('explore-farms.index')
            ->with('farms', $farms);
    }
    public function show($land_id)
    {

        $farm = farmProfile::find($land_id);
        $allFarms = farmProfile::all()->take(4);
        $product_user_id = $farm->user_id;

        $farm_products = farmProducts::where('id', $product_user_id)->paginate(8);
        $dt = Carbon::now();
        return view('explore-farms.view-farmer')
        ->with('farm', $farm)
        ->with('allFarms', $allFarms)
        ->with('dt', $dt)
        ->with('farm_products', $farm_products);

    }
    public function viewFarmer($land_id){
       // $current_user_id = auth()->user()->id;
       // $user_profile = Land::where('user_id', $current_user_id)->get();
       // $farms = farmProfile::where('user','desc')->get();
        return view('explore-farms.view-farmer');
    }
}
