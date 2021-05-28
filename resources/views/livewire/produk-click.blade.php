<div class="row row-cols-md-5" style="height: 550px;">
    @foreach ($produk as $item)
        <div class="col-3 mb-2">
            <div class="card p-2" wire:click="Add({{ $item->id }})" >
                <img src="{{ asset('img/produk/'. $item->foto ) }}" class="card-img-top text-center " style="height: 100px; width: 100px;" alt="...">
                <div class="card-text text-center align-items-center mt-2" style="height:50px ">
                    <small><b>{{ $item->nama_produk}}</b></small>
                </div>
            </div>
        </div>
    @endforeach
</div>