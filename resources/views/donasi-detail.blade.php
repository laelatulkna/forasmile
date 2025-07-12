<!DOCTYPE html>
<html lang="en">

@include('beranda-head')
<script src="https://app.midtrans.com/snap/snap.js"
      data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
{{-- <script src="https://app.sandbox.midtrans.com/snap/snap.js"
      data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script> --}}
<!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
<body>

  @include('beranda-navbar')


  <div class="container mt-5">
    <h2>Detail Donasi</h2>
  </div>

  <div class="container mt-4 mb-5 pb-5">
    <div class="row">

      <div class="col-md-6 mb-5">
        <img src="/assets/img/{{ $data->gambar }}" class="img-fluid rounded img-content">
        <h5 class="mb-3">Riwayat Donasi</h5>

        @if ($riwayat)

        @foreach ($riwayat as $item)
          {{-- <div class="bg-light p-3 rounded mb-3">
            <div class="d-flex justify-content-between">
              <span>{{ $item->donatur->nama_lengkap }} Memberikan Donasi Rp {{ number_format( $item->jumlah ) }}</span>
              <span>{{ \Carbon\Carbon::parse($item->tanggal_donasi)->format("d M Y") }}</span>
            </div>
          </div> --}}

          <div class="shadow p-3 rounded mb-3 riwayat-donasi">
            <div class="d-flex gap-3">
              <div>
                <img src="/assets/img/profil.jpg" alt="">
              </div>
  
              <div class="ket">
                <p class="mb-0">{{ $item->donatur->nama_lengkap[0] }}**********</p>
                <span style="font-size: 12px;">
                  <small>
                    {{ \Carbon\Carbon::parse($item->tanggal_donasi)->format("d M Y") }}
                  </small>
                </span>
  
                <p class="mb-0">Berdonasi : {{ number_format( $item->jumlah ) }}</p>
                <p class="text-secondary"><i>"{{ $item->pesan }}"</i></p>
  
              </div>
            </div>
          </div>
        @endforeach
            
        @endif

      </div>

      <div class="col-md-6 mb-5">
        <h2 class="mb-3">{{ $data->tujuan }}</h2>
        <p>{{ $data->ket }}</p>

        @if (session()->has("success"))
              <div class="alert text-white alert-success">
                {{ session("success") }}
              </div>
          @endif

          @if (session()->has("error"))
              <div class="alert text-white alert-danger">
                {{ session("error") }}
              </div>
          @endif

        <p class="mb-0">Target : Rp {{ number_format( $data->jumlah) }}</p>
        <p class="">Terkumpul : Rp {{ number_format( $data->terkumpul) }}</p>
        <p class="mb-2">Jumlah Donasi Anda : 
          {{-- <b>{{ isset($jumlah) ? "Rp " . number_format( $jumlah ) : "" }}</b> --}}
        </p>

        @if (!isset($token))
          <form action="{{ route('donasikan', $data->id_pengalokasian_dana) }}" method="POST">
            @csrf
            <input type="number" name="jumlah" class="form-control mb-4">
            <label for="">Pesan</label>
            <input type="text" name="pesan" class="form-control mb-4">
            <button class="btn btn-primary">Donasikan</button>
          </form>
        @endif
      </div>

      @if (isset($donasi))
          

    {{-- <script>
    setTimeout(() => {
      fetch('{{ route('verifikasi', $donasi->id_donasi) }}');
    }, 5000);

    setTimeout(() => {
      location.href = '{{ route('donasi.detail', $donasi->id_pengalokasian_dana) }}';
    }, 7000);
    </script> --}}

      @endif  

      @if (isset($token))
        <script>

          snap.pay('{{ $token }}', {
                onSuccess: function (result) {
                    fetch('{{ route('verifikasi', $donasi->id_donasi) }}');
                    alert("Pembayaran sukses!");
                    setTimeout(() => {
                        location.href = '{{ route('donasi.detail', $donasi->id_pengalokasian_dana) }}';
                      }, 2000);
                },
                onPending: function (result) {
                    alert("Menunggu pembayaran...");
                },
                onError: function (result) {
                    alert("Pembayaran gagal!");
                    setTimeout(() => {
                        location.href = '{{ route('donasi.detail', $donasi->id_pengalokasian_dana) }}';
                      }, 2000);
                }
            });
          
        </script>
      @endif


    </div>
  </div>

  @include('beranda-footer')
  
  @include('beranda-script')
</body>

</html>