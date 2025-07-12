<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="/assets/dashboard/img/apple-icon.png">
  <link rel="icon" type="image/png" href="/assets/dashboard/img/favicon.png">
  <title>
    Register
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

  <main style="background-image: url('assets/img/bg.jpg'); background-size: cover;" class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-6 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
              <div class="card mt-5 mb-5">
                <div class="card-header pb-0 text-start">
                  <h4 class="font-weight-bolder">Buat Akun Anda</h4>
                  <p class="mb-0">Silahkan Lengkapi Data Berikut Untuk Pembuatan Akun For Smile.</p>
                </div>
                <div class="card-body">

                  <style>
                      .form-group {
                        position: relative;
                      }

                      .icon-select {
                        width: 20px;
                        position: absolute;
                        right: 10px;
                        top:  40px;
                      }
                    </style>

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


                  <form role="form" method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group mb-3">
                      <label for="email2">Nama Lengkap</label>
                      <input required type="text" id="nama_lengkap" class="form-control @error('nama_lengkap') @enderror" id="email2" name="nama_lengkap" value="{{ old("nama_lengkap") }}" />
                    </div>

                    <div class="form-group mb-3">
                        <label for="email2">Alamat</label>
                        <input required type="text" id="alamat" class="form-control @error('alamat') @enderror" id="email2" name="alamat" value="{{ old("alamat") }}" />
                      </div>

                    <div class="form-group mb-3">
                      <label for="email2">Email</label>
                      <input required type="text" class="form-control @error('email') @enderror" id="email2" name="email" value="{{ old("email") }}" />
                    </div>

                    <div class="form-group mb-3">
                      <label for="email2">Username</label>
                      <input required type="text" class="form-control @error('username') @enderror" id="email2" name="username" value="<?= old("username") ?>" />
                    </div>

                    <div class="form-group mb-3">
                      <label for="email2">Password</label>
                      <input required type="password" class="form-control @error('password') @enderror " id="email2" name="password"  />
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Buat Akun</button>
                    </div>

                    <p class="mt-3">Sudah punya akun? <a href="{{ route('masuk') }}">Login</a></p>
                  </form>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </section>
  </main>

</body>

</html>
