
<!DOCTYPE html>
<html lang="en">

@include('head')

<body class="g-sidenav-show   bg-gray-100">
  <div class="min-height-300 position-absolute w-100" style="background: #F19823;"></div>
  @include('aside')
  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    @include('navbar')
    <!-- End Navbar -->
    
    {{-- Content --}}
    @yield('content')
    {{-- End Content --}}
  </main>
 
  @include('script')
</body>

</html>