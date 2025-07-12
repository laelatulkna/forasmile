<?php

namespace App\Http\Controllers;

use App\Models\AlokasiDana;
use App\Models\Dokumentasi;
use App\Models\Donasi;
use App\Models\Riwayat;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function beranda(Request $request)
    {
        return view("beranda", [
            "title" => "Beranda",
            "data" => AlokasiDana::limit(3)->orderBy('id_pengalokasian_dana', 'DESC')->get(),
        ]);
    }

    public function tentang(Request $request)
    {
        return view("tentang", [
            "title" => "Tentang",
        ]);
    }

    public function dokumentasi(Request $request)
    {
        return view("dokumentasi", [
            "title" => "Dokumentasi",
            "data" => Dokumentasi::orderBy('id_dokumentasi', 'DESC')->get(),
        ]);
    }

    public function donasi(Request $request)
    {
        return view("donasi", [
            "title" => "Donasi",
            "data" => AlokasiDana::orderBy('id_pengalokasian_dana', 'DESC')->get(),
        ]);
    }

    public function detail_donasi(Request $request, AlokasiDana $alokasiDana)
    {
        $id_pengalokasian_dana = $alokasiDana->id_pengalokasian_dana;
        $riwayatDonasi = Donasi::where('id_pengalokasian_dana', $id_pengalokasian_dana)->get();

        return view("donasi-detail", [
            "title" => "Donasi",
            "data" => $alokasiDana,
            "riwayat" => $riwayatDonasi,
        ]);
    }
}
