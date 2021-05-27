@extends('layouts/app')

@section('title', 'Data Member | Kasirku')

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('member') }}">Member</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Data Member</li>
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
                    <form method="POST" action="{{ route('member-edit-post', $member->id) }}">
                        @csrf
                        <div class="form-group">
                            <label for="inputEmail3">ID Member</label>
                            <input type="text" class="form-control" name="id_member" value="{{ $member->id_member }}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3">Nama</label>
                            <input type="text" class="form-control" name="nama" value="{{ $member->nama }}">
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3">No Handphone</label>
                            <input type="text" class="form-control" name="nohp" value="{{ $member->nohp }}">
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3">Alamat</label>
                            <textarea class="form-control" name="alamat">{{ $member->alamat }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary float-right">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection