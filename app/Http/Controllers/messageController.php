<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\message;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class messageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = DB::select('SELECT * FROM messages ORDER BY created_at DESC');
        $data['result'] = $result;
        
        return view('admin.message', $data);    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('visitor.contact', [
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
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required'
        ],
        [
            "name.required" => "Please enter your name",
            "email.required" => "Please enter your email",
            "subject.required" => "Please enter the subject",
            "message.required" => "Please enter your message",
        ]);

        $message = message::create([
            'name' => $request["name"],
            'email' => $request["date"],
            'subject' => $request["date"],
            'description' => $request["description"],
        ]);

        return redirect('/') -> with('Berhasil', "Pesan anda telah dikirim!");
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $message = message::destroy($id);
        return back() -> with('success', "Data berhasil dihapus!"); 
    }
}
