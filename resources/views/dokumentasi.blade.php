<!DOCTYPE html>
<html lang="en">

@include('beranda-head')

<body>

  @include('beranda-navbar')

  <style>
    .box-img {
      background: #eaeaea;
      background-position: center;
      background-size: cover;
    }
  </style>

<div class="container my-4 mb-5">
  <div id="carouselWithText" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">

      @if ($slider)
        @foreach ($slider as $item)
        <div class="carousel-item {{ $loop->iteration == 1 ? "active" : "" }}">
          <div class="box" style="background-image: url('assets/img/<?= $item->file ?>')"></div>
          <!-- <img src="assets/img/forasmile_content3.png" class="d-block w-100 img-fluid" alt="Slide 1"> -->
          <div class="carousel-caption d-none d-md-block">
            <p>{{ $item->ket }}</p>
          </div>
        </div>
        @endforeach
      @endif

      {{-- <!-- Slide 2 -->
      <div class="carousel-item">
        <div class="box"></div>

        <!-- <img src="assets/img/forasmile_content3.png" class="d-block w-100 img-fluid" alt="Slide 2"> -->
        <div class="carousel-caption d-none d-md-block">
          <h5>Judul Slide 2</h5>
          <p>Deskripsi slide kedua muncul di atas gambar.</p>
        </div>
      </div>

      <!-- Slide 3 -->
      <div class="carousel-item">
        <div class="box"></div>

        <!-- <img src="assets/img/forasmile_content3.png" class="d-block w-100 img-fluid" alt="Slide 3"> -->
        <div class="carousel-caption d-none d-md-block">
          <h5>Judul Slide 3</h5>
          <p>Teks ini bisa dikustom sesuai keinginan kamu.</p>
        </div>
      </div> --}}

    </div>

    <!-- Navigasi -->
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselWithText" data-bs-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselWithText" data-bs-slide="next">
      <span class="carousel-control-next-icon"></span>
    </button>
  </div>
</div>

<div class="container mb-5">
  <h5 class="mb-4">Dokumentasi Lainnya</h5>
    <div class="row">

      @if ($data)
        @foreach ($data as $item)
          @if ($loop->iteration > 5)
          <div class="col-md-4 mb-4">
            
              <div class="w-100 box-img rounded shadow mb-3" style="background-size: cover; height: 300px; background-image: url('assets/img/<?= $item->file ?>')"></div>
              <p class="mt-3">{{ $item->ket }}</p>
          </div>
          @endif
        @endforeach
      @endif

    </div>
  </div>

  @include('beranda-footer')
  
  @include('beranda-script')
</body>

</html>