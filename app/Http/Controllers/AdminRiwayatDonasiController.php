<?php

namespace App\Http\Controllers;

use App\Models\Donasi;
use Illuminate\Http\Request;

class AdminRiwayatDonasiController extends Controller
{
    public function index(Request $request)
    {
        return view("admin.riwayat-donasi.index", [
            "title" => "Riwayat Donasi",
            "data" => Donasi::where('is_valid', 1)->get(),
        ]);
    }
}
