@extends('admin-layout')
@section('content')
        
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-sm mb-0 text-uppercase font-weight-bold">JUMLAH<br>DONASI</p>
                  <h4 class="font-weight-bolder">
                    {{ $donasi }}
                  </h4>
                </div>
              </div>
              
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-sm mb-0 text-uppercase font-weight-bold">JUMLAH<br>ALOKASI DANA</p>
                  <h4 class="font-weight-bolder">
                    {{ $alokasi }}
                  </h4>
                </div>
              </div>
              
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-sm mb-0 text-uppercase font-weight-bold">JUMLAH<br>USER</p>
                  <h4 class="font-weight-bolder">
                    {{ $user }}
                  </h4>
                </div>
              </div>
              
            </div>
          </div>
        </div>
      </div>

    </div>
    
  </div>


  @endsection
