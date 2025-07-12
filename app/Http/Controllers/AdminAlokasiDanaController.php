<?php

namespace App\Http\Controllers;

use App\Models\AlokasiDana;
use Illuminate\Http\Request;

class AdminAlokasiDanaController extends Controller
{
    public function index(Request $request)
    {
        $alokasiDana = new AlokasiDana();
        return view("admin.alokasi-dana.index", [
            "title" => "Alokasi Dana",
            "data" => $alokasiDana->get(),
        ]);
    }

    public function create(Request $request)
    {
        return view("admin.alokasi-dana.create", [
            "title" => "Alokasi Dana",
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            "tujuan" => "required",
            "ket" => "required",
            "jumlah" => "required",
        ]);

        $filename  = "";
        $alokasiDana = new AlokasiDana();
        $alokasiDana->tujuan = $request->tujuan;
        $alokasiDana->ket = $request->ket;
        $alokasiDana->jumlah = $request->jumlah;
        $alokasiDana->disalurkan = 0;
        $alokasiDana->terkumpul = 0;

        if ($request->file("gambar")) {
            $file = $request->file("gambar");
            $filename = time() . "."  . $file->getClientOriginalExtension();
            $file->move("assets/img", $filename);
        }

        $alokasiDana->gambar = $filename;

        $alokasiDana->save();

        return redirect()->route("admin.alokasi-dana.index")->with("success", "Alokasi Dana Berhasil Ditambah!");
    }

    public function edit(Request $request, AlokasiDana $alokasiDana)
    {
        return view("admin.alokasi-dana.edit", [
            "title" => "Alokasi Dana",
            "data" => $alokasiDana,
        ]);
    }

    public function update(Request $request, AlokasiDana $alokasiDana)
    {
        $request->validate([
            "tujuan" => "required",
            "ket" => "required",
            "jumlah" => "required",
            "disalurkan" => "required",
        ]);

        $filename  = "";
        $alokasiDana->tujuan = $request->tujuan;
        $alokasiDana->ket = $request->ket;
        $alokasiDana->jumlah = $request->jumlah;
        $alokasiDana->disalurkan = $request->disalurkan;

        if ($request->file("gambar")) {
            $file = $request->file("gambar");
            $filename = time() . "."  . $file->getClientOriginalExtension();
            $file->move("assets/img", $filename);
            $alokasiDana->gambar = $filename;
        }


        $alokasiDana->save();

        return redirect()->route("admin.alokasi-dana.index")->with("success", "Alokasi Dana Berhasil Diupdate!");
    }

    public function destroy(Request $request, AlokasiDana $alokasiDana)
    {
        $alokasiDana->delete();
        return redirect()->route("admin.alokasi-dana.index")->with("success", "Alokasi Dana Berhasil Dihapus!");
    }
}
