<?php

namespace App\Http\Controllers;

use App\Models\Pengaturan;
use Illuminate\Http\Request;

class PengaturanController extends Controller
{
    //
    public function index(Request $request)
    {
        return view("admin.pengaturan", [
            "beranda" => Pengaturan::where('key', 'beranda')->first(),
            "tentang" => Pengaturan::where('key', 'tentang')->first(),
            "keterangan" => Pengaturan::where('key', 'ket-tentang')->first(),
            "visi" => Pengaturan::where('key', 'visi')->first(),
            "misi" => Pengaturan::where('key', 'misi')->first(),
            "moto" => Pengaturan::where('key', 'moto')->first(),
            "title" => "Pengaturan",
        ]);
    }

    public function beranda_store(Request $request)
    {
        $request->validate([
            "beranda" => "required",
        ]);

        $filename  = "";

        if ($request->file("beranda")) {
            $file = $request->file("beranda");
            $filename = time() . "."  . $file->getClientOriginalExtension();
            $file->move("assets/img", $filename);
        }

        $pengaturan = new Pengaturan();
        $pengaturan->where("key", "beranda")->update([
            "value" => $filename,
        ]);

        return redirect()->route("admin.pengaturan")->with("success", "Gambar Beranda Berhasil Diupload!");
    }

    public function tentang_store(Request $request)
    {
        $filename  = "";

        $pengaturan = new Pengaturan();

        if ($request->file("tentang")) {
            $file = $request->file("tentang");
            $filename = time() . "."  . $file->getClientOriginalExtension();
            $file->move("assets/img", $filename);
            $pengaturan->where("key", "tentang")->update([
                "value" => $filename,
            ]);
        }

        $pengaturan->where("key", "ket-tentang")->update([
            "value" => $request->ket,
        ]);

        $pengaturan->where("key", "visi")->update([
            "value" => $request->input('visi'),
        ]);

        $pengaturan->where("key", "misi")->update([
            "value" => $request->input('misi'),
        ]);

        $pengaturan->where("key", "moto")->update([
            "value" => $request->input('moto'),
        ]);

        return redirect()->route("admin.pengaturan")->with("success", "Tentang Berhasil Diperbarui!");
    }
}
