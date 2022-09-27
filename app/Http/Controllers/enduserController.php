<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\member;
use App\Models\product;
use App\Models\activity;
use App\Models\document;
use App\Models\banner;
use App\Models\message;
use Response;

class enduserController extends Controller
{
    public function homepage()
    {
        $product = DB::select('SELECT * FROM products ORDER BY created_at DESC LIMIT 6');
        $activity = DB::select('SELECT * FROM activities ORDER BY created_at DESC LIMIT 6');
        $banner = DB::select('SELECT * FROM banners WHERE status = "yes"');
        $total_banner = banner::all() -> count();

        return view('visitor.homepage', [
            'product' => $product,
            'activity' => $activity,
            'banner' => $banner,
            'total_banner' => $total_banner,
        ]);
    }

    public function aboutus()
    {
        $member = DB::select('SELECT * FROM members WHERE position <> "Anggota"');
        $document = DB::select('SELECT * FROM documents WHERE status = "yes"');

        return view('visitor.about', [
            'member' => $member,
            'document' => $document,
        ]);
    }

    public function create()
    {
        return view('visitor.contactForm', [
            'method'=> "POST",
            'action'=> "store",
        ]);
    }

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
            'email' => $request["email"],
            'subject' => $request["subject"],
            'message' => $request["message"],
        ]);

        return redirect('/kopegtel-Risti/contact') -> with('Berhasil', "Pesan anda telah dikirim!");
    }

    public function product()
    {
        // $product = DB::select('SELECT * FROM products ORDER BY created_at DESC');
        $product = DB::table('products')->paginate(9);
        $data['product'] = $product;
        
        return view('visitor.product', $data);  
    }

    public function activity()
    {
        $activity = DB::table('activities')->paginate(9);
        $data['activity'] = $activity;
        
        return view('visitor.activity', $data);  
    }
    
    public function activityDetail($id)
    {
        $activity =  activity:: find($id);
        $data['activity'] = $activity;
        
        return view('visitor.activity-detail', $data);  
    }

    public function contact()
    {  
        return view('visitor.contact');  
    }

    public function download(Request $request, $id)
    {
        $document = document:: find($id);

        return Storage::download($document->file, $document->fileName.".".$document->fileType);
    }

    public function show($id)
    {
        $activity =  activity:: find($id);
        $data['activity'] = $activity;

        return view('visitor.show');
    }
}
    