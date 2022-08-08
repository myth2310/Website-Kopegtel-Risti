<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\member;
use App\Models\product;
use App\Models\activity;
use App\Models\document;

class enduserController extends Controller
{
    public function homepage()
    {
        $product = DB::select('SELECT * FROM products ORDER BY created_at DESC');
        $activity = DB::select('SELECT * FROM activities ORDER BY created_at DESC');
        $banner = DB::select('SELECT * FROM banners WHERE status = "yes"');

        return view('visitor.homepage', [
            'product' => $product,
            'activity' => $activity,
            'banner' => $banner,
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
        
        return view('visitor.activity', $data);  
    }

    public function contact()
    {  
        return view('visitor.contact');  
    }
}
