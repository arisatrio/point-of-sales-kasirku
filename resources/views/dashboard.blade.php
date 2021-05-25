@extends('layouts/app')

@section('title', 'Nama Toko')

@section('content')
<div class="row">
    <div class="col-5">
        @livewire('invoice')
    </div>
    <div class="col-7">
        <div class="card shadow" style="height: 650px;">
            <div class="card-body">
                <div class="row row-cols-1 row-cols-md-5" style="height: 550px;">
                    @foreach ($produk as $item)
                        @livewire('produk-click', ['item' => $item])
                    @endforeach
                </div>
                <div class="row align-items-end">
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