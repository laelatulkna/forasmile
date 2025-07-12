<!DOCTYPE html>
<html lang="en">

@include('beranda-head')

<body>

  @include('beranda-navbar')

  <div>
    <img class="img-fluid w-100" src="assets/img/{{ $gambar->value }}">
  </div>
  <!-- judul konten -->
  <div class="container mt-5">
    <h2>Penyaluran Dana Sedekah</h2>
  </div>
  <!-- isi konten berupa tampilan 3 buah gambar beserta keterangan -->
  <div class="container mt-4 mb-5 pb-5">
    <div class="row">
      <!-- kolom pertama  -->

      @if ($data)
        @foreach ($data as $item)
        <div class="col-md-4 mb-4">
                <img src="/assets/img/<?= $item->gambar ?>" class="img-fluid rounded img-content">
                <h5><?= $item->tujuan ?></h5>
            </div>      
        @endforeach
      @endif
      
    </div>
  </div>

  @include('beranda-footer')
  
  @include('beranda-script')
</body>

</html>