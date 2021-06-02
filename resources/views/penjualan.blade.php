@extends('layouts/app')

@section('title', 'Data Penjualan | Kasirku')

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Penjualan</li>
    </ol>
</nav>
<div class="row mb-4">
    <div class="col">
        <div class="card shadow">
            <div class="card-body">                
                <div class="row mb-4">
                    <div class="col">
                        <h1>Data Penjualan</h1>
                    </div>
                    <div class="col">
                        <a href="{{ route('dashboard') }}" class="btn btn-success float-right">
                            <i class="fas fa-th-large"></i>
                            Mode Transaksi
                        </a>
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
                <div class="row">
                    <div class="col">
                        <table id="example" class="table table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col" style="width: 5%;">No</th>
                                    <th scope="col">Kode Transaksi</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Customer</th>
                                    <th scope="col">Grand Total</th>
                                    <th scope="col">Status</th>
                                    <th scope="col" style="width: 10%;">Handle</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1
                                @endphp
                                @foreach ($penjualan as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->kode }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->member->nama }}</td>
                                    <td>Rp{{ number_format($item->grand_total) }}</td>
                                    <td @if ($item->status !== "Lunas") class="text-white bg-danger" @else class="text-white bg-success" @endif>{{ $item->status }}</td>
                                    <td>
                                        <a href="{{ route('penjualan-detail', $item->id) }}"><i class="text-muted fas fa-eye mr-2"></i></a>
                                        <a href="{{ route('produk-edit', $item->id) }}"><i class="text-muted fas fa-pencil-alt mr-2"></i></a>
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