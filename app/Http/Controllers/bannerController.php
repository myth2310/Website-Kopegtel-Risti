<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\banner;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class bannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = DB::select('SELECT * FROM banners ORDER BY created_at DESC');
        $data['result'] = $result;
        
        return view('admin.banner', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.bannerForm', [
            'method'=> "POST",
            'action'=> "store",
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        $validator = $request -> validate([
            'name' => 'required',
            'image' => 'image|file|max:2048,jpeg,png,jpg',  
        ], 
        [
            "name.required" => "Please enter banner name",
            "image.required" => "Please insert image",
        ]);

        $banner = new Banner;
        $banner->name= $request->input('name');
        if($request->hasFile('image')){
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = $request->name.'_'.now()->timestamp.'.'.$extention;
            $file->storeAs('image/banner/',$filename);
            $banner->image = $filename;
        
        }
        

        $banner->save();

        

        return redirect('/banner') -> with('success', "Data berhasil ditambahkan!");
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
        $banner =  banner:: find($id);

        return view('admin.bannerForm', [
            'method'=> "PUT",
            'action'=> "/banner/update/{$id}",
            'banner'=> $banner
        ]);
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
        $banner = banner::find($id);
        $validator = $request -> validate([
            'name' => 'required',
            'status' => 'required',
            'image' => 'image|file|max:2048,jpeg,png,jpg',  
        ], 
        [
            "name.required" => "Please enter banner name",
            "image.required" => "Please insert image",
        ]);

        // if($request->hasFile('image')){
        //     $request->validate([
        //       'image' => 'image|file|max:2048,jpeg,png,jpg',
        //     ]);
        //     Storage::delete($banner->image);
        //     $path = $request->file('image')->store('images');
        //     $banner->image = $path;  
        // }

        if($request->hasFile('image')){
            $request->validate([
                'image' => 'image|file|max:2048,jpeg,png,jpg',
              ]);
            Storage::delete($banner->image);
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = $request->name.'_'.now()->timestamp.'.'.$extention;
            $file->storeAs('image/banner/',$filename);
            $banner->image = $filename;
        }

        $banner->name = $request->name;
        $banner->status = $request->status;
        $banner->save();

        

        return redirect('/banner') -> with('success', "Data berhasil diperbarui!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner = Banner::find($id);
        $path = 'storage/image/banner/'.$banner->image;
        if(File::exists($path)){
            File::delete($path);
        }
        $banner->delete();
        //$banner = banner::find($id);
        //Storage::delete($banner->image);

        //$banner = banner::destroy($id);
        return redirect('/banner') -> with('success', "Data berhasil dihapus!");
    }
}
