@extends('layouts/app')

@section('title', 'Data Kategori | Kasirku')

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('kategori') }}">Kategori</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Data Kategori</li>
    </ol>
</nav>
<div class="row mb-4">
    <div class="col-6">
        <div class="card shadow">
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col">
                        <h1>Edit Member</h1>
                    </div>
                </div>
                <div class="row">
                    <form method="POST" action="{{ route('kategori-edit-post', $kategori->id) }}">
                        @csrf
                        <div class="form-group">
                            <label for="inputEmail3">Kode</label>
                            <input type="text" class="form-control" name="kode" value="{{ $kategori->kode }}">
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3">Nama Kategori</label>
                            <input type="text" class="form-control" name="kategori" value="{{ $kategori->kategori }}">
                        </div>
                        <button type="submit" class="btn btn-primary float-right">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection