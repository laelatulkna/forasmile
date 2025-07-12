@extends('admin-layout')
@section('content')
        
<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-body">

          <div class="d-flex justify-content-between">
            <h6>Edit Data User Donatur</h6>
            
          </div>

          <form action="{{ route('admin.donatur.update', $data->id_user) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("put")
            <div class="mb-3">
              <label for="">Nama Lengkap</label>
              <input type="text" class="form-control @error("nama_lengkap") is-invalid @enderror form-control-lg" placeholder="Nama Lengkap" name="nama_lengkap" value="{{ old('nama_lengkap', $data->nama_lengkap) }}" >
            </div>

            <div class="mb-3">
              <label for="">Alamat</label>
              <input type="text" class="form-control @error("alamat") is-invalid @enderror form-control-lg" placeholder="Alamat" name="alamat" value="{{ old('alamat', $data->alamat) }}" >
            </div>

            <div class="mb-3">
              <label for="">Email </label>
              <input type="text" class="form-control @error("email") is-invalid @enderror form-control-lg" placeholder="email" name="email" value="{{ old('email', $data->email) }}" >
            </div>

            <div class="mb-3">
              <label for="">Username </label>
              <input type="text" class="form-control @error("username") is-invalid @enderror form-control-lg" placeholder="Username" name="username" value="{{ old('username', $data->user->username) }}" >
            </div>

            <div class="mb-3">
              <label for="">Password Baru </label>
              <input type="text" class="form-control @error("password") is-invalid @enderror form-control-lg" placeholder="password" name="password" value="{{ old('password') }}" >
            </div>

            <div class="mt-4">
              <a href="{{ route('admin.donatur.index') }}" class="btn btn-secondary btn-sm">Kembali</a>
              <button class="btn btn-primary btn-sm">Simpan</button>
            </div>
            </form>

          

        </div>
      </div>
    </div>
  </div>
  
</div>


  @endsection


