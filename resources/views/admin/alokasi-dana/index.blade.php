@extends('admin-layout')
@section('content')
        
<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-body">

          <div class="d-flex justify-content-between">
            <h6>Alokasi Dana Donasi</h6>
            <a href="{{ route('admin.alokasi-dana.create') }}" class="btn btn-primary btn-sm">Tambah</a>
          </div>

          @if (session()->has("success"))
              <div class="alert text-white alert-success">
                {{ session("success") }}
              </div>
          @endif

          <style>
            .box-img {
              width: 50px;
              height: 50px;
              background: #eaeaea;
              background-position: center;
              background-size: cover;
            }

            .btn-custom {
              cursor: pointer;
            }
          </style>

          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">No</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tujuan</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Keterangan</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Gambar</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jumlah</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Terkumpul</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Disalurkan</th>
                </tr>
              </thead>
              <tbody>

                @if ($data)

                  @foreach ($data as $item)
                    <tr>
                      <td>
                        <a href="{{ route('admin.alokasi-dana.edit', $item->id_pengalokasian_dana) }}">
                          <span class="badge btn-custom badge-sm bg-gradient-primary">
                            Edit
                          </span>
                        </a>
                        <form onsubmit="return confirm('Apakah Anda Yakin Menghapus?')" class="d-inline" action="{{ route('admin.alokasi-dana.destroy', $item->id_pengalokasian_dana) }}" method="POST">
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
                          {{ $item->tujuan }}
                        </p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">
                          {{ $item->ket }}
                        </p>
                      </td>
                      <td>
                        <div class="box-img" style="background-image: url('/assets/img/{{ $item->gambar }}')"></div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">
                          Rp {{  number_format( $item->jumlah ,0, ".", ",") }},-
                        </p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">
                          Rp {{  number_format( $item->terkumpul ,0, ".", ",") }},-
                        </p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">
                          Rp {{  number_format( $item->disalurkan ,0, ".", ",") }},-
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
