<?php

namespace App\Http\Controllers;

use App\Models\AlokasiDana;
use App\Models\Dokumentasi;
use App\Models\Donasi;
use App\Models\Pengaturan;
use App\Models\Riwayat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Midtrans\Snap;
use Midtrans\Config;

class BerandaController extends Controller
{
    public function beranda(Request $request)
    {
        return view("beranda", [
            "gambar" => Pengaturan::where('key', 'beranda')->first(),
            "title" => "Beranda",
            "data" => AlokasiDana::limit(3)->orderBy('id_pengalokasian_dana', 'DESC')->get(),
        ]);
    }

    public function tentang(Request $request)
    {
        return view("tentang", [
            "gambar" => Pengaturan::where('key', 'tentang')->first(),
            "tentang" => Pengaturan::where('key', 'ket-tentang')->first(),
            "visi" => Pengaturan::where('key', 'visi')->first(),
            "misi" => Pengaturan::where('key', 'misi')->first(),
            "moto" => Pengaturan::where('key', 'moto')->first(),
            "title" => "Tentang",
        ]);
    }

    public function dokumentasi(Request $request)
    {
        return view("dokumentasi", [
            "title" => "Dokumentasi",
            "slider" => Dokumentasi::orderBy('id_dokumentasi', 'DESC')->limit(5)->get(),
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
        if (!auth()->user()) {
            return redirect()->route('masuk');
        }

        $id_pengalokasian_dana = $alokasiDana->id_pengalokasian_dana;
        $riwayatDonasi = Donasi::where('id_pengalokasian_dana', $id_pengalokasian_dana)->where('is_valid', 1)->orderby('id_donasi', 'DESC')->limit(5)->get();

        return view("donasi-detail", [
            "title" => "Donasi",
            "data" => $alokasiDana,
            "riwayat" => $riwayatDonasi,
        ]);
    }

    public function set_nominal_donasi(Request $request, AlokasiDana $alokasiDana)

    {
        return view("donasi-detail", [
            "title" => "Donasi",
            "data" => $alokasiDana,
        ]);
    }

    public function donasikan(Request $request, AlokasiDana $alokasiDana)
    {
        $request->validate([
            "jumlah" => "required",
        ]);

        if ($request->jumlah < 1000) {
            return redirect()->route('donasi.detail', $alokasiDana->id_pengalokasian_dana)->with('error', 'Jumlah Donasi Tidak Boleh Kurang Dari 1000');
        }

        Config::$serverKey = config('midtrans.serverKey');
        Config::$isProduction = config('midtrans.isProduction');
        Config::$isSanitized = config('midtrans.isSanitized');
        Config::$is3ds = config('midtrans.is3ds');

        $id_user = auth()->user()->id_user;
        $order_id = uniqid();

        $donasi = new Donasi();
        $donasi->id_user = $id_user;
        $donasi->jumlah = $request->jumlah;
        $donasi->is_valid = 0;
        $donasi->id_pengalokasian_dana = $alokasiDana->id_pengalokasian_dana;
        $donasi->tanggal_donasi = date("Y-m-d");
        $donasi->pesan = $request->pesan;
        $donasi->save();

        $params = [
            'transaction_details' => [
                'order_id' => $order_id,
                'gross_amount' => $request->jumlah,
            ],
            'customer_details' => [
                'first_name' => auth()->user()->donatur->nama_lengkap,
                'email' => auth()->user()->donatur->email,
            ],
        ];


        $token = Snap::getSnapToken($params);

        return view("donasi-detail", [
            "title" => "Donasi",
            "data" => $alokasiDana,
            "token" => $token,
            "riwayat" => Donasi::where('id_pengalokasian_dana', $alokasiDana->id_pengalokasian_dana)->where('is_valid', 1)->orderby('id_donasi', 'DESC')->limit(10)->get(),
            "jumlah" => $request->jumlah,
            "donasi" => $donasi,
        ]);
    }

    public function verifikasi(Request $request, Donasi $donasi)
    {
        $donasi->is_valid = 1;
        $donasi->save();
        $alokasiDana = AlokasiDana::find($donasi->id_pengalokasian_dana);
        $jumlahDonasi = $donasi->jumlah;
        $jumlahBaru = $alokasiDana->terkumpul + $jumlahDonasi;
        $alokasiDana->terkumpul  = $jumlahBaru;
        $alokasiDana->save();

        return 1;
    }
}
