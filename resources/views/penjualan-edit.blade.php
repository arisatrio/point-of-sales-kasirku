@extends('layouts/app')

@section('title', 'Data Penjualan | Kasirku')

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('member') }}">Penjualan</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Data Penjualan</li>
    </ol>
</nav>
<div class="row mb-4">
    <div class="col-6">
        <div class="card shadow">
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col">
                        <h1>Edit Penjualan</h1>
                    </div>
                </div>
                <div class="row">
                    <form method="POST" action="">
                        @csrf
                        <div class="form-group">
                            <label for="inputEmail3">Kode Transaksi</label>
                            <input type="text" class="form-control" name="id_" value="" disabled>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3">Konsumen</label>
                            <input type="text" class="form-control" name="nama" value="">
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3">No Handphone</label>
                            <input type="text" class="form-control" name="nohp" value="">
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3">Alamat</label>
                            <textarea class="form-control" name="alamat"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary float-right">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection