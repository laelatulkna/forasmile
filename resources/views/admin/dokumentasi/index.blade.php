@extends('admin-layout')
@section('content')
        
<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-body">

          <div class="d-flex justify-content-between">
            <h6>Data Dokumentasi</h6>
            <a href="{{ route('admin.dokumentasi.create') }}" class="btn btn-primary btn-sm">Tambah</a>
          </div>

          @if (session()->has("success"))
              <div class="alert text-white alert-success">
                {{ session("success") }}
              </div>
          @endif

         
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">No</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Foto Dokumentasi</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Keterangan</th>
                </tr>
              </thead>
              <tbody>

                @if ($data)

                  @foreach ($data as $item)
                    <tr>
                      <td>
                        <a href="{{ route('admin.dokumentasi.edit', $item->id_dokumentasi) }}">
                          <span class="badge btn-custom badge-sm bg-gradient-primary">
                            Edit
                          </span>
                        </a>
                        <form onsubmit="return confirm('Apakah Anda Yakin Menghapus?')" class="d-inline" action="{{ route('admin.dokumentasi.destroy', $item->id_dokumentasi) }}" method="POST">
                          @csrf
                          @method('delete')
                          <button class="badge btn-custom badge-sm bg-gradient-danger border-0">
                            Hapus
                          </button>
                        </form>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">
                          {{ $loop->iteration }}
                        </p>
                      </td>
                      <td class="text-center">
                        <div class="box-img" style="background-image: url('/assets/img/{{ $item->file }}'); margin: 0 auto;"></div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">
                          {{ $item->ket }}
                        </p>
                      </td>
                    </tr>
                  @endforeach
                    
                @endif
               
              </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>
  </div>
  
</div>


  @endsection
