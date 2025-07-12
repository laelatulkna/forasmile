@extends('admin-layout')
@section('content')
        
<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-body">

          <div class="d-flex justify-content-between">
            <h6>Data User Donatur</h6>
            <a href="{{ route('admin.donatur.create') }}" class="btn btn-primary btn-sm">Tambah</a>
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
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Alamat</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Username</th>
                </tr>
              </thead>
              <tbody>

                @if ($data)

                  @foreach ($data as $item)
                    <tr>
                      <td>
                        <a href="{{ route('admin.donatur.edit', $item->id_user) }}">
                          <span class="badge btn-custom badge-sm bg-gradient-primary">
                            Edit
                          </span>
                        </a>
                        <form onsubmit="return confirm('Apakah Anda Yakin Menghapus?')" class="d-inline" action="{{ route('admin.donatur.destroy', $item->id_user) }}" method="POST">
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
                          {{ $item->nama_lengkap }}
                        </p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">
                          {{ $item->alamat }}
                        </p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">
                          {{ $item->email }}
                        </p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">
                          {{ $item->user->username }}
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
