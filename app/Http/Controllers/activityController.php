<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\activity;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class activityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = DB::select('SELECT * FROM activities ORDER BY created_at DESC');
        $data['result'] = $result;
        
        return view('admin.activity', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.activityForm', [
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
        $request -> validate([
            'name' => 'required',
            'date' => 'required',
            'description' => 'required',
            'image' => 'image|file|max:2048,jpeg,png,jpg',
        ],
        [
            "name.required" => "Please enter activity name",
            "date.required" => "Please enter date",
            "description.required" => "Please enter description",
            "image.required" => "Please insert image",
        ]);

        if ($request->file('image')){
            $image = $request->file('image')->store("/images/activity");
        }        
        
        $activity = activity::create([
            'name' => $request["name"],
            'date' => $request["date"],
            'description' => $request["description"],
            'image' => $image,
        ]);

        return redirect('/activity') -> with('success', "Data berhasil ditambahkan!");
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
        $activity =  activity:: find($id);

        return view('admin.activityForm', [
            'method'=> "PUT",
            'action'=> "/activity/update/{$id}",
            'activity'=> $activity
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
        $activity = activity::find($id); 
               
        $validator = $request -> validate([
            'name' => 'required',
            'date' => 'required',
            'description' => 'required',
            'image' => 'image|file|max:2048,jpeg,png,jpg',  
        ], 
        [
            "name.required" => "Please enter activity name",
            "date.required" => "Please enter date",
            "description.required" => "Please enter description",
        ]);

        if($request->hasFile('image')){
            $request->validate([
              'image' => 'image|file|max:2048,jpeg,png,jpg',
            ]);
            Storage::delete($activity->image);
            $path = $request->file('image')->store('images/activity');
            $activity->image = $path;
        }
        $activity->name = $request->name;
        $activity->date = $request->date;
        $activity->description = $request->description;
        $activity->save();

        return redirect('/activity') -> with('success', "Data berhasil diperbarui!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $activity = activity::find($id);
        Storage::delete($activity->image);

        $activity = activity::destroy($id);
        return back() -> with('success', "Data berhasil dihapus!"); 
    }
}
