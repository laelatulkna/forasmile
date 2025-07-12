@extends('donatur-layout')
@section('content')
        
<div class="container-fluid py-4">
    
  <div class="mt-2 ms-3">
    <h4 class="text-white mb-3">Selamat Datang Kembali {{ auth()->user()->donatur->nama_lengkap }}</h4>

    <h5 class="text-white">
      For a smile adalah sebuah program yang mengajak<br>
      kalian untuk berbagi kepada sesama.<br>
      Disini kita bisa berbagi makanan, stationary,<br>
      pakaian dan Uang.

    </h5>
  </div>
    
</div>

@endsection
