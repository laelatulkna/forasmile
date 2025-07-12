<!DOCTYPE html>
<html lang="en">

@include('beranda-head')

<body>

  @include('beranda-navbar')

  <div>
    <!-- konten apa itu semari dengan box oranye -->
    <img class="img-fluid w-100" src="assets/img/{{ $gambar->value }}">
    <!-- box berwarna oranye & posisi ditengah -->
    <div class="box1 tentang">
      <!-- judul -->
      <div class="judul">Apa itu For A Smile ?</div>
      <!-- isi / konten -->
      <div class="konten">
        {{ $tentang->value }}
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row mb-4">
      <div class="col-md-6">
        <div class="card border-0 shadow">
          <div class="card-body" style="min-height: 400px">
            <div class="text-center">
              <h5 class="mb-4">Visi</h5>

              {!! $visi->value !!}
            </div>

          </div>
        </div>
        
      </div>

      <div class="col-md-6">
        <div class="card border-0 shadow">
          <div class="card-body" style="min-height: 400px">
            <div class="text-center">
              <h5 class="mb-4">Misi</h5>
              {!! $misi->value !!}
            </div>

          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="card border-0 shadow">
          <div class="card-body" >
            <div class="text-center">
              <h5 class="mb-4">Moto</h5>

              <p>{{ $moto->value }}</p>
            </div>
          </div>
        </div>
        
      </div>
    </div>
  </div>

  @include('beranda-footer')
  
  @include('beranda-script')
</body>

</html>