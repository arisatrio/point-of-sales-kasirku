@extends('l/ayouts/app')

@section('title', 'Nama Toko')

@section('content')
<div class="row">
    <div class="col-5">
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
        @livewire('invoice')
    </div>
    <div class="col-7">
        <div class="card shadow" style="height: 650px;">
            <div class="card-body">
                @livewire('produk-click')
                <div class="row align-items-end mt-4">
                    <div class="col ">
                        <a href="" class="btn btn-outline-dark">Next</a>
                    </div>
                    <div class="col text-right">
                        <a href="" class="btn btn-outline-dark">Prev</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection