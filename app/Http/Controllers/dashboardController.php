<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\member;
use App\Models\product;
use App\Models\activity;
use Illuminate\Support\Facades\DB;

class dashboardController extends Controller
{
    public function dashboard()
    {
        $total_member = member::all() -> count();
        $total_product = product::all() -> count();
        $active_member = member::where('status', 'Aktif') -> count();
        $inactive_member = member::where('status', 'Pensiun') -> count();
        $anggota = member::limit(5) -> get();
        $aktivitas = activity::limit(5) -> get();

        return view('admin.dashboard', [
            'total_member' => $total_member,
            'total_product' => $total_product,
            'active_member' => $active_member,
            'inactive_member' => $inactive_member,
            'member' => $anggota,
            'activity' => $aktivitas,
        ]);
    }
}
