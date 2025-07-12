@extends('admin-layout')
@section('content')
        
<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-body">

          <div class="d-flex justify-content-between">
            <h6>Edit Dokumentasi</h6>
            
          </div>

          <form action="{{ route('admin.dokumentasi.update', $data->id_dokumentasi) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')

            <div class="mb-3">
              <label for="">Keterangan</label>
              <textarea name="ket" id="" cols="30" rows="10" class="form-control">{{ $data->ket }}</textarea>
            </div>

            <div class="mt-4">
              <a href="{{ route('admin.dokumentasi.index') }}" class="btn btn-secondary btn-sm">Kembali</a>
              <button class="btn btn-primary btn-sm">Simpan</button>
            </div>
            </form>

          

        </div>
      </div>
    </div>
  </div>
  
</div>


  @endsection




