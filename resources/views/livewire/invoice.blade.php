<form method="POST" action="{{ route('penjualan-post') }}">
@csrf
<div class="card shadow" style="height: 650px;">
    <div class="card-body">
        <div class="row">
            <div class="col-1">
                <i class="fas fa-user mt-2"></i>
            </div>
            <div class="col">
                <div class="form-group">
                    <select class="form-control" id="exampleFormControlSelect1" name="member_id">
                        <option selected disabled>Umum</option>
                        @foreach ($member as $item)
                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <hr>
        <div class="row" style="height: 350px; overflow-y: scroll;">
            <div class="col">
                <table class="table table-bordered">
                    <thead>
                    <tr >
                        <th scope="col" >Nama Produk</th>
                        <th scope="col" style="width:10%">Qty</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Subtotal</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($cart['produk'] as $item)
                            <tr>
                                <td>{{ $item['nama_produk'] }}</td>
                                <td>{{ $item['qty'] }}</td>
                                <td>{{ number_format($item['harga']) }}</td>
                                <td>{{ number_format($item['subtotal']) }}</td>
                                <td>
                                    <button type="button" wire:click="removeItem({{ $item['id'] }})" class="text-danger">
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
        {{-- @php
            dd($cart['produk']['0'])
        @endphp --}}
        <div class="row">
            <div class="col">
                <p>Total Produk</p>
            </div>
            <div class="col text-right">
                <p>{{ $cartTotal }} 
                    ( @php $sum = 0;
                        foreach ($cart['produk'] as $item) {
                            $sum += $item['qty'];
                        } 
                        echo $sum
                    @endphp )
                </p>
                <input name="grand_total" type="hidden" value="{{ $grandTotal }}">
            </div>
        </div>
        <div class="row font-weight-bold bg-light mb-2">
            <div class="col">
                <p class="">Total</p>
            </div>
            <div class="col text-right">
                <p>Rp{{ number_format($grandTotal) }}</p>
            </div>
        </div>
        <div class="row text-center">
            <button wire:click="checkout()" type="button" class="col btn btn-lg btn-danger mr-1">Batal</button>
            <button type="button" class="col btn btn-lg btn-success" data-toggle="modal" data-target="#exampleModal">
                Bayar
            </button>
            <!-- Modal -->
            <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Pembayaran</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                            <div class="modal-body text-left">
                                <div class="row mb-2">
                                    <div class="col-2">
                                        <button type="button" wire:click="setUangPas({{ $grandTotal }})" class="btn btn-primary">UANG PAS</button>
                                    </div>
                                    <div class="col-10">
                                        <input type="text" name="jumlah_bayar" class="form-control" placeholder="Nominal" value="{{ $uang }}">
                                    </div>
                                </div>
                                <div class="row text-center">
                                    <div class="col ">
                                        <button type="button" wire:click="setUang({{ 100000 }})" class="btn btn-outline-primary">100.000</button>
                                        <button type="button" wire:click="setUang({{ 50000 }})" class=" btn btn-outline-primary">50.000</button>
                                        <button type="button" wire:click="setUang({{ 20000 }})" class=" btn btn-outline-primary">20.000</button>
                                        <button type="button" wire:click="setUang({{ 10000 }})" class=" btn btn-outline-primary">10.000</button>
                                        <button type="button" wire:click="setUang({{ 5000 }})" class=" btn btn-outline-primary">5.000</button>
                                        <button type="button" wire:click="setUangNull()" class=" btn btn-danger"><i class="fas fa-times"></i></button>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col text-left">
                                        <p>Total Produk</p>
                                        <p>Total</p>
                                    </div>
                                    <div class="col text-right">
                                        <p>{{ $cartTotal }}
                                            ( @php $sum = 0;
                                                foreach ($cart['produk'] as $item) {
                                                    $sum += $item['qty'];
                                                } 
                                                echo $sum
                                            @endphp )
                                        </p>
                                        <p>Rp{{ number_format($grandTotal) }}</p>
                                    </div>
                                </div>
                                <div class="row font-weight-bold bg-light">
                                    <div class="col text-left">
                                        <p>Total Pembayaran</p>
                                    </div>
                                    <div class="col text-right">
                                        <p>Rp{{ number_format($uang) }}</p>
                                    </div>
                                </div>
                                <div class="row font-weight-bold bg-light">
                                    <div class="col text-left">
                                        <p>Kembalian</p>
                                    </div>
                                    <div class="col text-right">
                                        <p>Rp{{ number_format($kembalian) }}</p>
                                    </div>
                                </div>
                                <input type="hidden" name="grand_total" value="{{ $grandTotal }}">
                                <input type="hidden" name="kembalian" value="{{ $kembalian }}">
                                @if ($kembalian < 0) <div class="alert alert-danger">Nominal uang Pembayaran kurang dari Total Bayar!.</div> @endif
                                <hr>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">Catatan</label>
                                            <textarea class="form-control" name="catatan" rows="2"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <label>Status Pembayaran</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" value="Lunas" @if ($kembalian >= 0) checked @endif>
                                    <label class="form-check-label" for="status">LUNAS</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" value="Belum Lunas" @if ($kembalian < 0) checked @endif>
                                    <label class="form-check-label" for="status">BELUM LUNAS</label>
                                </div>
                            </div>
                            <input name="cart" type="hidden" value="{{ json_encode($cart['produk'], TRUE) }}">
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <button wire:click="checkout()"  type="submit" class="btn btn-success">Simpan</button>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</form>