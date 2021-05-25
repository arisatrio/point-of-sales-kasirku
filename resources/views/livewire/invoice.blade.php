<div class="card shadow" style="height: 650px;">
    <div class="card-body">
        <div class="row">
            <div class="col-1">
                <i class="fas fa-user mt-2"></i>
            </div>
            <div class="col">
                <div class="form-group">
                    <select class="form-control" id="exampleFormControlSelect1">
                        <option>Yanto</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
            </div>
            <div class="col-2 float-left">
                <button><i class="fas fa-plus-circle mt-1 fa-2x float-left"></i></button>
            </div>
        </div>
        <hr>
        <div class="row" style="height: 320px;">
            <div class="col">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">Nama Produk</th>
                        <th scope="col">Harga</th>
                        <th scope="col" style="width:5%">Qty</th>
                        <th scope="col">Subtotal</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                @isset($this->item['nama_produk'])
                                {{ $this->item['nama_produk'] }}
                                @endisset
                            </td>
                            <td>Mark</td>
                            <td>{{ $qty }}</td>
                            <td>@mdo</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col">
                <p>Total Item</p>
                <p>Total</p>
            </div>
            <div class="col text-right">
                <p>10</p>
                <p>10.000</p>
            </div>
        </div>
        <div class="row font-weight-bold bg-light">
            <div class="col">
                <p class="">Total Pembayaran</p>
            </div>
            <div class="col text-right">
                <p>10.000</p>
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
                    <a href="" class="btn btn-lg btn-success">Bayar</a>
                </div>
            </div>
        </div>
    </div>
</div>