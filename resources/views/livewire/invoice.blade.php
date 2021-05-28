<div class="card shadow" style="height: 650px;">
    <div class="card-body">
        <div class="row">
            <div class="col-1">
                <i class="fas fa-user mt-2"></i>
            </div>
            <div class="col">
                <div class="form-group">
                    <select class="form-control" id="exampleFormControlSelect1">
                        @foreach ($member as $item)
                        <option @if($item->nama === 'Umur') selected @endif value="{{ $item->id }}">{{ $item->nama }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <hr>
        <div class="row overflow-auto" style="height: 320px;">
            <div class="col">
                <table class="table table-bordered">
                    <thead>
                    <tr >
                        <th scope="col" >Nama Produk</th>
                        <th scope="col">Harga</th>
                        <th scope="col" style="width:5%">Qty</th>
                        <th scope="col">Subtotal</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($cart['produk'] as $item)
                            <tr>
                                <td>{{ $item['nama_produk'] }}</td>
                                <td>{{ number_format($item['harga']) }}</td>
                                <td>{{ $item['qty'] }}</td>
                                <td>{{ number_format($item['subtotal']) }}</td>
                                <td>
                                    <button wire:click="removeItem({{ $item['id'] }})" class="text-danger">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col">
                <p>Total Produk</p>
                <p>Total</p>
            </div>
            <div class="col text-right">
                <p>{{ $cartTotal }}</p>
                <p>Rp{{ number_format($grandTotal) }}</p>
            </div>
        </div>
        <div class="row font-weight-bold bg-light">
            <div class="col">
                <p class="">Total Pembayaran</p>
            </div>
            <div class="col text-right">
                <p>Rp{{ number_format($grandTotal) }}</p>
            </div>
        </div>
        <div class="row text-center">
            <div class="col ">
                <div class="bg-danger">
                    <a href="" class="btn btn-lg btn-danger">Batal</a>
                </div>
            </div>
            <div class="col">
                <div class="bg-success">
                    <button href="" class="btn btn-lg btn-success">Bayar</button>
                </div>
            </div>
        </div>
    </div>
</div>