<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="{{ asset('fa/css/all.min.css') }}" rel="stylesheet">
    <title>@yield('title')</title>
    <link rel="icon" href="#">
  </head>
  <body>
<div class="container pt-4">
    <div class="row justify-content-center">
        <div class="col-6 justify-content-center">
            <div class="card shadow">
                <div class="card-body">
                    <p class="text-muted"><i class="fas fa-user mt-2"></i>Member</p>
                    <p>
                        {{-- {{ $order->nama }} | {{ $order->nohp}} <br>
                        {{ $order->alamat }} <br>
                        <b>KAB. INDRAMAYU - {{ $order->kec }}, JAWA BARAT, ID {{ $order->kodepos }} </b> --}}
                    </p>
                </div>
            </div>
            <div class="card shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            {{-- <img src="{{ asset('/img/produk/'. $produk->foto) }}" class="img-fluid"> --}}
                        </div>
                        <div class="col">
                            <h5>
                                <b></b> <br>
                            </h5>
                            Rp
                        </div>
                    </div>
                    <hr>
                    <div class="bg-light p-2">
                        <p class="text-muted"><i class="fas fa-truck mr-2"></i>Jasa Pengiriman</p>
                        <div class="row">
                            <div class="col-6">
                                <p>
                                    ML Express
                                </p>
                            </div>
                            <div class="col-6 float-right">
                                <p class="float-right">Rp.10,000</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <i class="fas fa-dollar-sign"></i>
                            Metode Pembayaran<p></p>
                            <p>Subtotal untuk Produk</p>
                            <p>Subtotal Pengiriman</p>
                        </div>
                        <div class="col-6">
                            <p class="text-right"><b>COD [Bayar di tempat]</b></p>
                            <p class="text-right"></p>
                            <p class="text-right">Rp.10,000</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <p>Total Pemabyaran</p>
                            <h5>Rp.</h5>
                        </div>
                        <div class="col">
                            {{-- <a href="{{ route('index') }}" class="float-right mt-2 btn btn-lg btn-danger">Konfirmasi</a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>