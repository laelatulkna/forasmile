<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
  <div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
    <a class="navbar-brand m-0" href="#" target="_blank">
      <img src="/assets/img/logo.png" class="navbar-brand-img h-100" alt="main_logo" style="transform: scale(2.2)">
      <span class="ms-1 font-weight-bold">For A Smile</span>
    </a>
  </div>
  <hr class="horizontal dark mt-0">
  <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link {{ $title == "Dashboard" ? "active" : "" }}" href="<?= route('admin.dashboard') ?>">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ $title == "Alokasi Dana" ? "active" : "" }}" href="{{ route('admin.alokasi-dana.index') }}">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Alokasi Dana</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ $title == "Riwayat Donasi" ? "active" : "" }}" href="{{ route('admin.riwayat-donasi.index') }}">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-credit-card text-success text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Riwayat Donasi</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ $title == "Dokumentasi" ? "active" : "" }}" href="{{ route('admin.dokumentasi.index') }}">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-app text-info text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Dokumentasi</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ $title == "Kelola User" ? "active" : "" }}" href="{{ route('admin.donatur.index') }}">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-world-2 text-danger text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Kelola User</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link {{ $title == "Pengaturan" ? "active" : "" }}" href="{{ route('admin.pengaturan') }}">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-world-2 text-danger text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Pengaturan</span>
        </a>
      </li>


      <li class="nav-item">
        <a class="nav-link " href="{{ route('logout') }}">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-world-2 text-danger text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Logout</span>
        </a>
      </li>
      
    </ul>
  </div>
  
</aside>