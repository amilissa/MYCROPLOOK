<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gate;
use App\Post;
use App\User;
use Storage;
use App\CropList;

class AdminController extends Controller
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
        if(!Gate::allows('isAdmin')){
            abort(404, 'Sorry, the page you are looking for could not be found');
        }
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $allPosts = Post::all();

        return view('admin.index')
        ->with('allPosts', $allPosts)
        ->with('posts', $user->posts);

}
public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeCrop(Request $request)
    {
        //
        $this->validate($request, [
            'crop_name' => 'required|unique:croplist',
            'default_cropImage' => 'required|Image'
        ]);


        //handle file upload

        if($request->hasFile('default_cropImage')){
            //get the filename with the extension
            $filenameWithExt = $request->file('default_cropImage')->getClientOriginalName();
            //get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get just extension
            $extension= $request->file('default_cropImage')->getClientOriginalExtension();
            $filenameToStore = $filename.'_'.time().'.'.$extension;
            // upload image
            
            $pathToFile = Storage::disk('public')->put('uploads/croplists/', $filenameToStore);

            //$path = $request->file('default_cropImage')->storeAs('public/uploads/croplists/', $filenameToStore);

        } else{
        }
        //create post
        $crop = new CropList;
        $crop->crop_name = $request->input('crop_name');
        $crop->default_cropImage = $filenameToStore;
        $crop->save();

        return redirect('/admin/crop-lists')->with('success', 'Crop Created');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $crop =  CropList::find($id);
        $crop->delete();
        return redirect('/admin/crop-lists')->with('success', 'Crop Removed');
    }
    public function getCropLists(){
        if(!Gate::allows('isAdmin')){
        abort(404, 'Sorry, the page you are looking for could not be found');
    }

        $crops = CropList::all();

        return view('admin.crop-lists')
                ->with('crops', $crops);
    }
    public function getBanners(){
        if(!Gate::allows('isAdmin')){
            abort(404, 'Sorry, the page you are looking for could not be found');
        }

        return view('admin.banners');
    }
    public function getStatistics(){
        if(!Gate::allows('isAdmin')){
            abort(404, 'Sorry, the page you are looking for could not be found');
        }
        return view('admin.statistics');
    }
    public function getSeasonalCrops(){
        if(!Gate::allows('isAdmin')){
            abort(404, 'Sorry, the page you are looking for could not be found');
        }
        return view('admin.seasonal-crops');
    }
    public function getConfirmUsers(){
        if(!Gate::allows('isAdmin')){
            abort(404, 'Sorry, the page you are looking for could not be found');
        }
        return view('admin.confirm-users');
    }
    public function getAdminUsers(){
        if(!Gate::allows('isAdmin')){
            abort(404, 'Sorry, the page you are looking for could not be found');
        }
        return view('admin.admin-users');
    }
}
