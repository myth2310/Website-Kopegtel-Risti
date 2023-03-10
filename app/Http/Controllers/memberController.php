<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\member;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Exports\MemberExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\File;

class memberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = DB::select('SELECT * FROM members ORDER BY created_at DESC');
        $data['result'] = $result;
        
        return view('admin.member', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.memberForm', [
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
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',  
            'position' => 'required',  
            'status' => 'required',
            'image' => 'image|file|max:2048,jpeg,png,jpg',
        ], 
        [
            "name.required" => "Please enter member name",
            "email.required" => "Please enter email",
            "email.unique" => "Email already used",
            "phone.required" => "Please enter phone number",
            "address.required" => "Please enter address",
            "image.required" => "Please insert image",
        ]);

        $member = new Member;
        $member->name= $request->input('name');
        $member->email= $request->input('email');
        $member->phone= $request->input('phone');
        $member->address= $request->input('address');
        $member->position= $request->input('position');
        $member->status= $request->input('status');
        if($request->hasFile('image')){
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = $request->name.'_'.now()->timestamp.'.'.$extention;
            $file->storeAs('image/pengurus/',$filename);
            $member->image = $filename;
        }
        
        $member->save();

        return redirect('/member') -> with('success', "Data berhasil ditambahkan!");  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return member::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $member =  member:: find($id);

        return view('admin.memberForm', [
            'method'=> "PUT",
            'action'=> "/member/update/{$id}",
            'member'=> $member
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
        $member = member::find($id);
        
        $validator = $request -> validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',  
            'position' => 'required',  
            'status' => 'required',
            'image' => 'image|file|max:2048,jpeg,png,jpg',
        ], 
        [
            "name.required" => "Please enter member name",
            "email.required" => "Please enter email",
            "email.unique" => "Email already used",
            "phone.required" => "Please enter phone number",
            "address.required" => "Please enter address",
            "image.required" => "Please insert image",
        ]);

        // if($request->hasFile('image')){
        //     $request->validate([
        //       'image' => 'image|file|max:2048,jpeg,png,jpg',
        //     ]);
        //     Storage::delete($member->image);
        //     $path = $request->file('image')->store('images/member');
        //     $member->image = $path;
        // }

        if($request->hasFile('image')){
            $request->validate([
                'image' => 'image|file|max:2048,jpeg,png,jpg',
              ]);
            Storage::delete($member->image);
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = $request->name.'_'.now()->timestamp.'.'.$extention;
            $file->storeAs('image/pengurus/',$filename);
            $member->image = $filename;
        }

        $member->name = $validator["name"];
        $member->phone = $validator["phone"];
        $member->address = $validator["address"];
        $member->position = $validator["position"];
        $member->status = $validator["status"];

        if ($member -> email != $request -> email) {
            $member->email = $validator["email"];
        } 
        $member->save();

        return redirect('/member') -> with('success', "Data berhasil diperbarui!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $member = member::find($id);
        // Storage::delete($member->image);

        // $member = member::destroy($id);
        // return back() -> with('success', "Data berhasil dihapus!");
        $member = Member::find($id);
        $path = 'storage/image/pengurus/'.$member->image;
        if(File::exists($path)){
            File::delete($path);
        }
        $member->delete();
        
        return back() -> with('success', "Data berhasil dihapus!"); 
    }

    // Download data
    public function download()
    {
        return Excel::download(new MemberExport, 'DataAnggota_KopegtelRisti.xlsx');

        // return redirect('/member') -> with('success', "Data anggota berhasil di download!"); 
    }
}
