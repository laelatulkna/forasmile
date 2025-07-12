<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Donatur;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use App\Helpers\MailHelper;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $username = $request->input('username');
        $password = ($request->input('password'));
        $user = User::where('username', $username)
            ->where('password', $password)->first();

        if (!$user) {
            return redirect()->route('masuk')->with('error', 'Username Atau Password Salah!');
        }

        Auth::login($user);

        if ($user->role == "donatur") {
            return redirect()->route('beranda');
        }

        if ($user->role == "admin") {
            return redirect()->route('admin.dashboard');
        }
    }

    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:donatur,email',
            'nama_lengkap' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username',
            'password' => 'required|string',
        ]);

        $email = $request->input('email');
        $nama = $request->input('nama_lengkap');
        $alamat = $request->input('alamat');
        $username = $request->input('username');
        $password = ($request->input('password'));

        $user = User::create([
            'username' => $username,
            'password' => $password,
            "role" => "donatur",
        ]);

        $donatur = Donatur::create([
            "id_user" => $user->id_user,
            'nama_lengkap' => $nama,
            'alamat' => $alamat,
            'email' => $email,
        ]);

        if ($user) {
            return redirect()->route('masuk')->with('success', 'Akun baru berhasil dibuat! Silahkan Login.');
        } else {
            return redirect()->route('daftar')->with('error', 'Gagal membuat akun baru!');
        }
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('beranda');
    }

    public function lupa_sandi(Request $request)
    {
        return view('lupa-sandi');
        # code...
    }

    public function kirim_token(Request $request)
    {
        $email = $request->email;
        $isKirimToken = $request->_token;

        if (!$email) {
            return redirect()->route('lupa-sandi')->with('error', "Email tidak boleh kosong!");
        }

        $user = Donatur::where("email", $email)->first();

        if (!$user) {
            return redirect()->route('lupa-sandi')->with('error', "Email tidak ditemukan!");
        }

        if ($isKirimToken) {
            $token = rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9);

            $donatur = Donatur::where('id_user', $user->id_user)->first();
            $email = $donatur ? $donatur->email : "";

            $to = $email;
            $subject = 'Token Reset Password';
            $body = '<h1>Token Anda : ' . $token . '</h1>';

            $hasil = MailHelper::sendEmail($to, $subject, $body);

            $userModel = new User;
            $userModel->where("id_user", $user->user->id_user)->update([
                "token" => $token,
            ]);
        }


        return view("token", ["email" => $email]);
    }

    public function verifikasi_token(Request $request)
    {
        $userToken = $request->token;
        $email = $request->email;

        $user = Donatur::where('email', $email)->first();
        $databaseToken = $user->user->token;

        if ($userToken != $databaseToken) {
            return redirect(route('token') . "?email=$email")->with('error', "Token tidak valid!");
        }

        return redirect(route('password-baru') . "?token=$databaseToken&user={$user->id_user}");
    }

    public function password_baru(Request $request)
    {
        $token = $request->token;
        $id = $request->user;

        if (!$token || !$id) {
            return redirect()->route('masuk');
        }

        $user = User::where("id_user", $id)->where('token', $token)->first();
        if (!$user) {
            return redirect()->route('masuk');
        }

        return view("password-baru", ["token" => $token]);
    }

    public function store_password_baru(Request $request)
    {
        $password = $request->password;
        $token = $request->token;

        $user = User::where('token', $token)->first();
        if ($user) {
            $user->token = null;
            $user->password = $password;
            $user->save();
        }

        return redirect()->route('masuk')->with("success", "Password Anda Berhasil Diganti!");
    }
}
