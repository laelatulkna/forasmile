@extends('admin-layout')
@section('content')
        
<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-body">

          <div class="d-flex justify-content-between">
            <h6>Riwayat Donasi Donatur</h6>
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
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Donatur</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jumlah Donasi</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tujuan Alokasi</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal DOnasi</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                </tr>
              </thead>
              <tbody>

                @if ($data)

                  @foreach ($data as $item)
                    <tr>
                      <td>
                        <form onsubmit="return confirm('Apakah Anda Yakin Menghapus?')" class="d-inline" action="{{ route('admin.riwayat-donasi.destroy', $item->id_donasi) }}" method="POST">
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
                      <td>
                        <p class="text-xs font-weight-bold mb-0">
                          {{ $item->donatur->nama_lengkap }}
                        </p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">
                         Rp {{ number_format( $item->jumlah ,0, ".", ",") }},-
                        </p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">
                          {{ $item->alokasi->tujuan }}
                        </p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">
                          {{ $item->tanggal_donasi }}
                        </p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">
                          {{ $item->is_valid == 1? "Valid" : "Tidak Valid" }}
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
