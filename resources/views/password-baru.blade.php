<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="/assets/dashboard/img/apple-icon.png">
  <link rel="icon" type="image/png" href="/assets/dashboard/img/favicon.png">
  <title>
    Password Baru Anda For A Smile
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="/assets/dashboard/css/nucleo-icons.css" rel="stylesheet" />
  <link href="/assets/dashboard/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="/assets/dashboard/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="/assets/dashboard/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
</head>

<body class="">

  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
              <div class="card card-plain">
                <div class="card-header pb-0 text-start">
                  <h4 class="font-weight-bolder">Password Baru</h4>
                  <p class="mb-0">Silahkan Masukkan Password Baru Anda Untuk Login Ke For A Smile</p>
                </div>
                <div class="card-body">

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                  
                  <form role="form" method="POST" action="{{ route('password-baru.store') }}">
                    @csrf
                    <div class="mb-3">
                      <input type="text" name="password" class="form-control form-control-lg" placeholder="Password Baru Anda" >
                    </div>

                    <div class="mb-3">
                      <input type="hidden" name="token" class="form-control form-control-lg" value="{{ $token }}">
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mb-0">Simpan</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
              <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden" style="background-image: url('assets/dinas.jpg');
          background-size: cover;">
          <style>
            /*.bg-gradient-primary {
                background: linear-gradient(310deg, #5e72e4 0%, #825ee4 10%) !important;
              }*/
          </style>
                <span class="mask bg-gradient-dark opacity-3" style="background-image: url('assets/img/bg.jpg')"></span>
                <h4 class="mt-5 text-white font-weight-bolder position-relative">"Salurkan Donasi Anda"</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  <script src="/assets/dashboard/js/core/popper.min.js"></script>
  <script src="/assets/dashboard/js/core/bootstrap.min.js"></script>
  <script src="/assets/dashboard/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="/assets/dashboard/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="/assets/dashboard/js/argon-dashboard.min.js?v=2.0.4"></script>
</body>

</html>
