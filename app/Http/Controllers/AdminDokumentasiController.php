<?php

namespace App\Http\Controllers;

use App\Models\Dokumentasi;
use Illuminate\Http\Request;

class AdminDokumentasiController extends Controller
{
    //
    public function index(Request $request)
    {
        $dokumentasi = new Dokumentasi();
        return view("admin.dokumentasi.index", [
            "title" => "Dokumentasi",
            "data" => $dokumentasi->get(),
        ]);
    }

    public function create(Request $request)
    {
        return view("admin.dokumentasi.create", [
            "title" => "Dokumentasi",
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            "file" => "required",
        ]);

        $filename  = "";
        $dokumentasi = new Dokumentasi();

        if ($request->file("file")) {
            $file = $request->file("file");
            $filename = time() . "."  . $file->getClientOriginalExtension();
            $file->move("assets/img", $filename);
        }

        $dokumentasi->file = $filename;
        $dokumentasi->ket = $request->ket;

        $dokumentasi->save();

        return redirect()->route("admin.dokumentasi.index")->with("success", "Dokumentasi Berhasil Ditambah!");
    }

    public function edit(Request $request, Dokumentasi $dokumentasi)
    {
        return view("admin.dokumentasi.edit", [
            "title" => "Dokumentasi",
            "data" => $dokumentasi
        ]);
    }

    public function update(Request $request, Dokumentasi $dokumentasi)
    {

        $dokumentasi->ket = $request->ket;

        $dokumentasi->save();

        return redirect()->route("admin.dokumentasi.index")->with("success", "Dokumentasi Berhasil Diupdate!");
    }

    public function destroy(Request $request, Dokumentasi $dokumentasi)
    {
        $dokumentasi->delete();
        return redirect()->route("admin.dokumentasi.index")->with("success", "Dokumentasi Berhasil Dihapus!");
    }
}
