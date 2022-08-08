<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\document;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class documentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = DB::select('SELECT * FROM documents ORDER BY created_at DESC');
        $data['result'] = $result;
        
        return view('admin.document', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.documentForm', [
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
            'fileName' => 'required',
            'file' => 'required|mimes:pdf,xlx,csv|max:2048',
        ], 
        [
            "fileName.required" => "Please enter document name",
            "file.required" => "Please add document file",
        ]);

        if ($request->file('file')){
            $file = $request->file('file')->store("/files");
        }        
        
        $fileType = $request->file('file')->extension();

        $document = document::create([
            'fileName' => $request["fileName"],
            'file' => $file,
            'fileType' => $fileType,
        ]);

        return redirect('/document') -> with('success', "Data berhasil ditambahkan!"); 
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
        $document =  document:: find($id);

        return view('admin.documentForm', [
            'method'=> "PUT",
            'action'=> "/document/update/{$id}",
            'document'=> $document
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
        $document = document::find($id);  

        $validator = $request -> validate([
            'fileName' => 'required',
            'status' => 'required',
            'file' => 'mimes:pdf,xlx,csv|max:2048',
        ], 
        [
            "fileName.required" => "Please enter document fileName",
        ]);

        if($request->hasFile('file')){
            $request->validate([
                'file' => 'required|mimes:pdf,xlx,csv|max:2048',
            ]);
            Storage::delete($document->file);
            $path = $request->file('file')->store('/files');
            $document->file = $path;
            $fileType = $request->file('file')->extension();
            $document->fileType = $fileType;
        }        
        $document->fileName = $request->fileName;
        $document->status = $request->status;                
        $document->save();
        
        return redirect('/document') -> with('success', "Data berhasil diperbarui!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $document = document::find($id);
        Storage::delete($document->file);

        $document = document::destroy($id);
        return back() -> with('success', "Document successfully deleted!"); 
    }
}
