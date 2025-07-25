@extends('admin-layout')
@section('content')
        
<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-body">

          <div class="d-flex justify-content-between">
            <h6>Edit Alokasi Dana Donasi</h6>
            
          </div>

          <form action="{{ route('admin.alokasi-dana.update', $data->id_pengalokasian_dana) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("put")
            <div class="mb-3">
              <label for="">Tujuan Donasi</label>
              <input type="text" class="form-control @error("tujuan") is-invalid @enderror form-control-lg" placeholder="Tujuan" name="tujuan" value="{{ old('tujuan', $data->tujuan) }}" >
            </div>

            <div class="mb-3">
              <label for="">Keterangan</label>
              <input type="text" class="form-control @error("ket") is-invalid @enderror form-control-lg" placeholder="Keterangan" name="ket" value="{{ old('ket', $data->ket) }}" >
            </div>

            <div class="mb-3">
              <label for="">Jumlah </label>
              <input type="number" class="form-control @error("jumlah") is-invalid @enderror form-control-lg" placeholder="Jumlah" name="jumlah" value="{{ old('jumlah', $data->jumlah) }}" >
            </div>

            <div class="mb-3">
              <label for="">Disalurkan </label>
              <input type="number" class="form-control @error("disalurkan") is-invalid @enderror form-control-lg" placeholder="disalurkan" name="disalurkan" value="{{ old('disalurkan', $data->disalurkan) }}" >
            </div>

            <div class="mb-3">
              <label for="">Gambar Baru</label>
              <input type="file" class="form-control form-control-lg" placeholder="Keterangan" name="gambar" value="{{ old('gambar') }}" >
            </div>

            <div class="mt-4">

              
              <a href="{{ route('admin.alokasi-dana.index') }}" class="btn btn-secondary btn-sm">Kembali</a>
              <button class="btn btn-primary btn-sm">Simpan</button>
            </div>
            </form>

          

        </div>
      </div>
    </div>
  </div>
  
</div>


  @endsection


