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

    public function product()
    {
        $product = DB::select('SELECT * FROM products ORDER BY created_at DESC');
        $data['product'] = $product;
        
        return view('visitor.product', $data);  
    }

    public function activity()
    {
        $activity = DB::select('SELECT * FROM activities ORDER BY created_at DESC');
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
}
