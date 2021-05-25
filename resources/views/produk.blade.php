@extends('layouts/app')

@section('title', 'Nama Toko')

@section('content')
<div class="row mb-4">
    <div class="col-8">
        <div class="card shadow">
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col">
                        <h1>Tambah Produk</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <form method="POST" action="{{ route('kategori-post') }}">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Kode</label>
                                <input type="text" class="form-control" name="kode">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Produk</label>
                                <input type="text" class="form-control" name="nama_produk">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Example select</label>
                                <select class="form-control" id="exampleFormControlSelect1">
                                    @foreach ($kategori as $item)
                                    <option>{{ $item->kategori }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Harga</label>
                                <input type="text" class="form-control" name="Harga">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">stok</label>
                                <input type="number" class="form-control" name="stok">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">deskripsi</label>
                                <input type="text" class="form-control" name="deskripsi">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">foto</label>
                                <input type="file" class="form-control" name="foto">
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card shadow">
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col text-center">
                        <h2>Dashboard</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="card bg-primary">
                            <div class="text-center text-white p-2">
                                <h6>Total Kategori</h6>
                                <h2 class="font-weight-bold"></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mb-4">
    <div class="col">
        <div class="card shadow">
            <div class="card-body">
                <h1>Data Kategori</h1>
                <div class="row">
                    <div class="col">
                        <table id="example" class="table table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Kode</th>
                                    <th scope="col">Nama Kategori</th>
                                    <th scope="col" style="width: 5%;">Handle</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @php
                                    $no = 1
                                @endphp
                                @foreach ($kategori as $item)
                                <tr>
                                    {{-- <td>{{ $no++ }}</td>
                                    <td>{{ $item->kode }}</td>
                                    <td>{{ $item->kategori }}</td>
                                    <td>
                                        <a href=""><i class="text-muted fas fa-pencil-alt"></i></a>
                                        <a href=""><i class="text-muted text-center fas fa-trash-alt"></a>
                                    </td> --}}
                                {{-- </tr>
                                @endforeach --}}
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