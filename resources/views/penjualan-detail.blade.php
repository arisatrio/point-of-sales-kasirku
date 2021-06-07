<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="{{ asset('fa/css/all.min.css') }}" rel="stylesheet">
    <title>Invoice {{ $penjualan->kode }}</title>
    <link rel="icon" href="#">
    </head>
    <body>
        <div class="container mt-3">
            <div class="row justify-content-center">
                <div class="col-6 justify-content-center">
                    <div class="card shadow">
                        <div class="pt-2 pl-3 @if ($penjualan->kembalian < 0) text-white bg-danger @else bg-success text-white @endif">
                            <p><b>Transaksi Berhasil @if ($penjualan->kembalian < 0) [{{ $penjualan->status }}] @endif</b></p>
                        </div>
                    </div>
                    <div class="card shadow text-center text-muted">
                        <div class="card-body">
                            <p>
                                <b>{{ auth()->user()->name }}</b>
                                <br>
                                {{ auth()->user()->alamat_toko }}
                                <br>
                                {{ auth()->user()->nohp }}
                            </p>
                        </div>
                    </div>
                    <div class="card shadow">
                        <div class="card-body">
                            <p class="text-muted">
                                <i class="fas fa-cash-register mr-2"></i>
                                {{ auth()->user()->name }}
                                <br>
                                <i class="fas fa-barcode mr-2"></i>
                                {{ $penjualan->kode }}
                                <br>
                                <i class="fas fa-calendar-alt mr-2"></i>
                                {{ $penjualan->created_at }}
                                <br>
                                <i class="fas fa-user mr-2"></i>
                                @if ($penjualan->member != null) {{ $penjualan->member->nama }} | {{ $penjualan->member->id_member }} @endif Umum
                            </p>
                            <hr>
                            @foreach ($produkPenj as $item)
                            <div class="row">
                                <div class="col-3">
                                    <img src="{{ asset('/img/produk/'. $item->produk->foto) }}" class="img-fluid" style="height: 100px; width: 100px">
                                </div>
                                <div class="col">
                                    <h6>
                                        <b>{{ $item->produk->nama_produk }}</b> <br>
                                    </h6>
                                    <p>
                                        Rp{{ number_format($item->produk->harga) }} x {{ $item->qty }}
                                    </p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <p>Total Produk</p>
                                    <p>Total</p>
                                </div>
                                <div class="col-6">
                                    <p class="text-right">{{ $produkPenj->count() }} ({{ $produkPenj->sum('qty') }})</p>
                                    <p class="text-right">Rp{{ number_format($penjualan->grand_total) }}</p>
                                </div>
                            </div>
                            <div class="row @if ($penjualan->kembalian < 0) text-white bg-danger pt-2 @endif">
                                <div class="col">
                                    <p><b>Total Pembayaran</b></p>
                                    <p><b>Kembalian</b></p>
                                </div>
                                <div class="col">
                                    <p class="text-right"><b>Rp{{ number_format($penjualan->jumlah_bayar) }}</b></p>
                                    <p class="text-right"><b>Rp{{ number_format($penjualan->kembalian) }}</b></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                        <div class="row">
                            <a href="" class="col-8 btn btn-warning text-white">
                                <i class="fas fa-print mr-2"></i>
                                PRINT NOTA
                            </a>
                        </div>
                        <div class="row">
                            <a href="{{ route('transaksi') }}" class="col-8 btn btn-success">
                                <i class="fas fa-th-large mr-2"></i>
                                KEMBALI KE POS
                            </a>
                        </div>
                        <div class="row">
                            <a href="{{ route('penjualan') }}" class="col-8 btn btn-info">
                                <i class="fas fa-shopping-cart mr-2"></i>
                                RIWAYAT PENJUALAN
                            </a>
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