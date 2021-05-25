@extends('layouts/app')

@section('title', 'Nama Toko')

@section('content')
<div class="row mb-4">
    <div class="col-8">
        <div class="card shadow">
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col">
                        <h1>Tambah Kategori</h1>
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
                                <label for="exampleInputEmail1">Nama Kategori</label>
                                <input type="text" class="form-control" name="kategori">
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
                                <h2 class="font-weight-bold">{{ $kategori->count() }}</h2>
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
                                    <th scope="col" style="width: 5%;">No</th>
                                    <th scope="col">Kode</th>
                                    <th scope="col">Nama Kategori</th>
                                    <th scope="col" style="width: 5%;">Handle</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1
                                @endphp
                                @foreach ($kategori as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->kode }}</td>
                                    <td>{{ $item->kategori }}</td>
                                    <td>
                                        <a href=""><i class="text-muted fas fa-pencil-alt"></i></a>
                                        <a href="" class="text-muted"><i class="fas fa-trash"></i></a>
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