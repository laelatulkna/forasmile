<?php

namespace App\Http\Controllers;

use App\Models\Donatur;
use App\Models\User;
use Illuminate\Http\Request;

class DataUserController extends Controller
{
    //
    public function index(Request $request)
    {
        $donatur = new Donatur();
        return view("admin.donatur.index", [
            "title" => "Kelola User",
            "data" => $donatur->get(),
        ]);
    }

    public function create(Request $request)
    {
        return view("admin.donatur.create", [
            "title" => "Kelola User",
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            "username" => "required",
            "password" => "required",
            "nama_lengkap" => "required",
            "alamat" => "required",
            "email" => "required",
        ]);

        $user = new User();
        $user->username = $request->username;
        $user->password = $request->password;
        $user->role = "donatur";
        $user->save();

        $donatur = new Donatur();
        $donatur->id_user = $user->id;
        $donatur->nama_lengkap = $request->nama_lengkap;
        $donatur->alamat = $request->alamat;
        $donatur->email = $request->email;
        $donatur->save();

        return redirect()->route("admin.donatur.index")->with("success", "Data User Berhasil Ditambah!");
    }

    public function edit(Request $request, $id)
    {
        $donatur = new Donatur();
        $user = $donatur->where('id_user', $id)->get();

        return view("admin.donatur.edit", [
            "title" => "Kelola User",
            "data" => $user[0],
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            "username" => "required",
            "nama_lengkap" => "required",
            "alamat" => "required",
            "email" => "required",
        ]);

        $donatur = new Donatur();
        $donatur->where("id_user", $id)->update([
            "nama_lengkap" => $request->nama_lengkap,
            "alamat" => $request->alamat,
            "email" => $request->email,
        ]);

        $user = new User();
        $newUserData = [
            "username" => $request->username,
        ];
        if ($request->password) {
            $newUserData["password"] = $request->password;
        }
        $user->where("id_user", $id)->update($newUserData);

        return redirect()->route("admin.donatur.index")->with("success", "Data User Berhasil Diupdate!");
    }

    public function destroy(Request $request, $id)
    {
        $user = new User();
        $donatur = new Donatur();
        $donatur->where("id_user", $id)->delete();
        $user->where("id_user", $id)->delete();

        return redirect()->route("admin.donatur.index")->with("success", "Data User Berhasil Dihapus!");
    }
}
