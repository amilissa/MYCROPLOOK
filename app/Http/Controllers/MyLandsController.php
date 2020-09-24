<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\userProfile;
use App\Post;
use Storage;
use App\User;
use App\Lands;


class MyLandsController extends Controller
{
    public function userlands()
    {
        $current_user_id = auth()->user()->id;
        $user_profile = Lands::where('user_id', $current_user_id)->get();
        return view('users.user-lands')->with('user_profile', $user_profile);
    }
    public function addlands()
    {
        $current_user_id = auth()->user()->id;
        $user_profile = User::where('id', $current_user_id)->get();
        return view('users.add-lands')->with('user_profile', $user_profile);
    }
    //store lands
    public function storelands(Request $request)
    { {
            //
            $this->validate($request, [
                'nameOfCompany' => 'required',
                'landAddress' => 'required',
                'landArea' => 'required',
                'landElevation' => 'required',
                'landImage' => 'Image|nullable'

            ]);

            //handle file upload

            if ($request->hasFile('landImage')) {
                //get the filename with the extension
                $filenameWithExt = $request->file('landImage')->getClientOriginalName();
                //get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                //get just extension
                $extension = $request->file('landImage')->getClientOriginalExtension();
                $filenameToStore = $filename . '_' . time() . '.' . $extension;
                // upload image
                
                $pathToFile = Storage::disk('public')->put('public/uploads/landImage/', $filenameToStore);
            
                //$path = $request->file('landImage')->storeAs('public/uploads/landImage/', $filenameToStore);
            } else {
                $filenameToStore = 'no-image.jpg';
            }

            //create user
            $user_lands = new Lands;
            $user_lands->name_of_company = $request->input('nameOfCompany');
            $user_lands->land_address = $request->input('landAddress');
            $user_lands->land_area = $request->input('landArea');
            $user_lands->land_elevation = $request->input('landElevation');
            $user_lands->user_id = auth()->user()->id;

            $user_lands->land_image = $filenameToStore;

            $user_lands->save();

            return redirect('users')->with('success', 'Land Added!');
        }
    }
}
