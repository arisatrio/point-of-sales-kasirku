@extends('layouts/app')

@section('title', 'Data Member | Kasirku')

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data Member</li>
    </ol>
</nav>
<div class="row mb-4">
    <div class="col">
        <div class="card shadow">
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col">
                        <h1>Data Member</h1>
                    </div>
                    <div class="col">
                        <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#exampleModal">
                            <i class="fas fa-plus"></i>
                            Tambah Member
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
                            <form method="POST" action="{{ route('member-post') }}">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="inputEmail3">Nama</label>
                                        <input type="text" class="form-control" name="nama">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword3">No Handphone</label>
                                        <input type="text" class="form-control" name="nohp">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword3">Alamat</label>
                                        <textarea class="form-control" name="alamat"></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <table id="example" class="table table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col" style="width: 5%;">No</th>
                                    <th scope="col">ID Member</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">No Handphone</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col" style="width: 5%;">Handle</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1
                                @endphp
                                @isset($member)
                                @foreach ($member as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->id_member }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->nohp }}</td>
                                    <td>{{ $item->alamat }}</td>
                                    <td>
                                        <a href="{{ route('member-edit', $item->id) }}"><i class="text-muted fas fa-pencil-alt ml-2 mr-3"></i></a>
                                        <button>
                                            <form method="POST" action="{{ route('member-delete', $item->id) }}">
                                                @csrf
                                                @method("DELETE")
                                                <button type="submit"><i class="fas fa-trash text-muted"></i></button>
                                            </form>
                                        </button>
                                    </td>
                                </tr>                                
                                @endforeach
                                @endisset
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