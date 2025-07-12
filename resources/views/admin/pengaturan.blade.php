@extends('admin-layout')
@section('content')

<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

        
<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-body">

          <div class="d-flex justify-content-between">
            <h6>Pengaturan</h6>
            
          </div>

          <style>
            .box-img {
              width: 250px;
              height: 200px;
              background: #eaeaea;
              background-position: center;
              background-size: cover;
              margin: 0 auto;
            }
          </style>

          @if (session()->has("success"))
          <div class="alert text-white alert-success">
            {{ session("success") }}
          </div>
          @endif

          <form action="{{ route('admin.beranda.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="text-center">
              <div class="box-img" style="background-image: url('/assets/img/{{ $beranda->value }}')"></div>
            </div>

            <div class="mb-3">
              <label for="">Gambar Beranda Baru</label>
              <input type="file" class="form-control @error("beranda") is-invalid @enderror form-control-lg" placeholder="Nama Lengkap" name="beranda" value="{{ old('beranda') }}" >
            </div>

            <div class="mt-4">
              <button class="btn btn-primary btn-sm">Upload</button>
            </div>
          </form>


          <form action="{{ route('admin.tentang.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="text-center">
              <div class="box-img" style="background-image: url('/assets/img/{{ $tentang->value }}')"></div>
            </div>

            <div class="mb-3">
              <label for="">Gambar Tentang Baru</label>
              <input type="file" class="form-control @error("tentang") is-invalid @enderror form-control-lg" placeholder="Nama Lengkap" name="tentang" value="{{ old('tentang') }}" >
            </div>

            <div class="mb-3">
              <label for="">Keterangan Tentang</label>
              <textarea name="ket" id="ket" cols="30" rows="10" class="form-control @error("ket") is-invalid @enderror">{{ $keterangan->value }}</textarea>
            </div>

            

            <div class="mb-3">
              <label for="">Visi</label>
              <textarea name="visi" id="visi" cols="30" rows="10" class="form-control @error("visi") is-invalid @enderror">{{ $visi->value }}</textarea>
            </div>

            <script>
              ClassicEditor
                .create(document.querySelector('#visi'))
                .catch(error => {
                    console.error(error);
                });
            </script>


            <div class="mb-3">
              <label for="">Misi</label>
              <textarea name="misi" id="misi" cols="30" rows="10" class="form-control @error("misi") is-invalid @enderror">{{ $misi->value }}</textarea>
            </div>

            <script>
              ClassicEditor
                .create(document.querySelector('#misi'))
                .catch(error => {
                    console.error(error);
                });
            </script>
            

            <div class="mb-3">
              <label for="">Moto</label>
              <textarea name="moto" id="" cols="30" rows="10" class="form-control @error("moto") is-invalid @enderror">{{ $moto->value }}</textarea>
            </div>

            <div class="mt-4">
              <button class="btn btn-primary btn-sm">Simpan</button>
            </div>
            </form>

          

        </div>
      </div>
    </div>
  </div>
  
</div>


  @endsection


