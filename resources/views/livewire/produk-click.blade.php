<div class="col-3">
    <div class="card" wire:click="Add({{ $item->id }})" wire:loading.class="bg-danger">
        <img src="{{ asset('img/produk/'. $item->foto ) }}" class="card-img-top" alt="...">
        <div class="card-body text-center">
            <div class="card-title">{{ $item->nama_produk}}</div>
            <small>10.000</small>
        </div>
    </div>
</div>