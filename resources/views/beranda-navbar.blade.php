<nav class="navbar navbar-expand-md bg-navbar">
  <div class="container mx-2" style="max-width: 100%!important;">

    <a class="navbar-brand" href="#">
      <img src="/assets/img/logo.png" class="img-logo">
    </a>

    <button class="navbar-toggler navbar-dark" type="button" data-bs-toggle="collapse"
      data-bs-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false"
      aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExample07">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link text-white" aria-current="page" href="{{ route('beranda') }}">Beranda</a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white" aria-current="page" href="{{ route('tentang') }}">Tentang</a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white" href="{{ route('donasi') }}">Donasi</a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white" href="{{ route('dokumentasi') }}">Dokumentasi</a>
        </li>

        @if (auth()->user())
          <li class="nav-item">
            <a class="nav-link text-white" href="{{ route('donatur.dashboard') }}">Dashboard Anda</a>
          </li>
        @endif
      </ul>

      <ul class="navbar-nav mb-2 mb-lg-0 justify-content-end">

        <li class="nav-item">
          @if (auth()->user())
            <a class="nav-link text-white" href="{{ route('donatur.dashboard') }}">Halo, {{ isset(auth()->user()->donatur->nama_lengkap) ? auth()->user()->donatur->nama_lengkap : auth()->user()->username }}
              <img src="/assets/img/logo-user.png">
            </a>
          @else
            <a class="nav-link text-white" href="{{ route('masuk') }}">Masuk
              <img src="/assets/img/logo-user.png">
            </a>
          @endif
        </li>

      </ul>

    </div>
  </div>
</nav>