@extends('layouts/app')

@section('title', 'Data Produk | Kasirku')

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Produk</li>
    </ol>
</nav>
<div class="row mb-4">
    <div class="col">
        <div class="card shadow">
            <div class="card-body">                
                <div class="row mb-4">
                    <div class="col">
                        <h1>Data Produk</h1>
                    </div>
                    <div class="col">
                        <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#exampleModal">
                            <i class="fas fa-plus"></i>
                            Tambah Produk
                        </button>
                    </div>
                </div>
                @if (session('messages'))
                <div class="alert alert-success alert-dismissible">
                    {{ session('messages') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                @endif
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Member</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="POST" action="{{ route('produk-post') }}" enctype="multipart/form-data">
                                @csrf 
                                <div class="modal-body">                                    
                                    @if($kategori == null)
                                    <div class="alert alert-danger">
                                        <p>Anda belum menambahkan Data Kategori!.</p>
                                    </div>
                                    @endif
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Kode</label>
                                        <input type="text" class="form-control" name="kode_produk">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama Produk</label>
                                        <input type="text" class="form-control" name="nama_produk" maxlength="40" placeholder="Maksimal 40 karakter">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Kategori</label>
                                        <select class="form-control" name="kategori_id">
                                            <option selected disabled>--Pilih Kategori--</option>
                                            @foreach ($kategori as $item)
                                            <option value="{{ $item->id }}">{{ $item->kategori }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Harga</label>
                                        <input type="text" class="form-control" name="harga">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Stok</label>
                                        <input type="number" class="form-control" name="stok">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Deskripsi</label>
                                        <input type="text" class="form-control" name="deskripsi">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Foto</label>
                                        <input type="file" class="form-control" name="foto">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Modal -->
                <div class="row">
                    <div class="col">
                        <table id="example" class="table table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col" style="width: 5%;">No</th>
                                    <th scope="col">Kode</th>
                                    <th scope="col">Nama Produk</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Stok</th>
                                    <th scope="col" style="width: 5%;">Handle</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1
                                @endphp
                                @foreach ($produk as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->kode_produk }}</td>
                                    <td>{{ $item->nama_produk }}</td>
                                    <td>{{ $item->kategori->kategori }}</td>
                                    <td>Rp{{ number_format($item->harga) }}</td>
                                    <td @if($item->stok <= 0) class="bg-danger" @endif>{{ $item->stok }}</td>
                                    <td>
                                        <a href="{{ route('produk-edit', $item->id) }}"><i class="text-muted fas fa-pencil-alt ml-2 mr-3"></i></a>
                                        <button>
                                            <form method="POST" action="{{ route('produk-delete', $item->id) }}">
                                                @csrf
                                                @method("DELETE")
                                                <button type="submit"><i class="fas fa-trash text-muted"></i></button>
                                            </form>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <script>
                            $(document).ready(function() {
                                $('#example').DataTable();
                            } );
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection