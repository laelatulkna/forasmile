<?php

namespace App\Http\Controllers;

use App\Models\AlokasiDana;
use App\Models\Donasi;
use App\Models\Donatur;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    //
    public function index(Request $request)
    {
        if (!auth()->user() || auth()->user()->role != "admin") {
            return redirect('masuk');
        }

        return view("admin.dashboard", [
            "title" => "Dashboard",
            "donasi" => Donasi::where('is_valid', 1)->count(),
            "alokasi" => AlokasiDana::count(),
            "user" => Donatur::count()
        ]);
    }
}
