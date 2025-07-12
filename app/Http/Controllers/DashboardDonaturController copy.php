<?php

namespace App\Http\Controllers;

use App\Models\Donasi;
use Illuminate\Http\Request;

class DashboardDonaturController extends Controller
{
    //
    public function index(Request $request)
    {
        if (!auth()->user()) {
            return redirect('masuk');
        }

        return view('donatur.dashboard', [
            'title' => "Dashboard",
        ]);
    }

    public function riwayat(Request $request)
    {
        return view('donatur.riwayat-donasi', [
            'title' => "Dashboard",
            'data' => Donasi::where('id_user', auth()->user()->id_user)->where('is_valid', 1)->orderBy('id_user', 'DESC')->get(),
            'data' => Donasi::orderBy('id_user', 'DESC')->get(),
        ]);
    }
}
