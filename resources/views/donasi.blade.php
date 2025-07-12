<!DOCTYPE html>
<html lang="en">

@include('beranda-head')

<body>

  @include('beranda-navbar')

  <div class="container mt-5">
    <h2>Salurkan Sedekah Anda</h2>
  </div>

  <style>
    .box-img {
      background: #eaeaea;
      background-position: center;
      background-size: cover;
    }
  </style>

  <div class="container mt-4 mb-5 pb-5">
    <div class="row">

      @if ($data)
        @foreach ($data as $item)
          <div class="col-md-4 mb-5">
            <div class="w-100 box-img rounded shadow mb-3" style="height: 300px; background-image: url('assets/img/{{  $item->gambar }}')"></div>
            <h5 class="mb-3">{{ $item->tujuan }}</h5>
          <a href="{{ route('donasi.detail', $item->id_pengalokasian_dana) }}" class="btn btn-sm btn-primary">Donasi</a>
          </div>
        @endforeach
      @endif

    </div>
  </div>

  @include('beranda-footer')
  
  @include('beranda-script')
</body>

</html>