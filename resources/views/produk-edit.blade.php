@extends('layouts/app')

@section('title', 'Data Produk | Kasirku')

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('member') }}">Produk</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Data Produk</li>
    </ol>
</nav>
<div class="row mb-4">
    <div class="col-6">
        <div class="card shadow">
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col">
                        <h1>Edit Produk</h1>
                    </div>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                @endif
                <div class="row">
                    <form method="POST" action="{{ route('produk-edit-post', $produk->id) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="inputEmail3">Kode Produk</label>
                            <input type="text" class="form-control" name="kode_produk" value="{{ $produk->kode_produk }}">
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3">Nama Produk</label>
                            <input type="text" class="form-control" name="nama_produk" value="{{ $produk->nama_produk }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Kategori</label>
                            <select class="form-control" name="kategori_id">
                                @foreach ($kategori as $item)
                                <option @if($produk->kategori === $item->id) selected @endif value="{{ $item->id }}">{{ $item->kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3">Harga</label>
                            <input type="text" class="form-control" name="harga" value="{{ $produk->harga }}">
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3">Stok</label>
                            <input type="number" class="form-control" name="stok" value="{{ $produk->stok }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Deskripsi</label>
                            <input type="text" class="form-control" name="deskripsi" value="{{ $produk->deskripsi }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Foto Produk</label>
                            <img class="img-fluid mb-2" src="{{ asset('img/produk/'.$produk->foto) }}" style="height: 200px; width: 250px;">
                            <input type="file" class="form-control" name="foto">
                            <input type="hidden" name="hidden_image" value="{{ $produk->foto }}">
                        </div>
                        <button type="submit" class="btn btn-primary float-right">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection