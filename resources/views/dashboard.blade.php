@extends('layouts/app')

@section('title', 'Dashboard')

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.3.2/chart.min.js" integrity="sha512-VCHVc5miKoln972iJPvkQrUYYq7XpxXzvqNfiul1H4aZDwGBGC0lq373KNleaB2LpnC2a/iNfE5zoRYmB4TRDQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
<div class="row mb-4">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-3">
                        <div class="card" style="border-top: 4px solid; border-top-color : blue;">
                            <div class="card-body">
                                <div class="judul">
                                    <span><b>This Month</b> | {{ $today->today()->format('F Y') }}</span>
                                </div>
                                <div class="isi">
                                    <span>Rp</span>
                                    <span style="font-size: 24pt">
                                        <b>
                                            @php
                                            if ($thisMonth < 1000000) {
                                                $format = number_format($thisMonth);
                                            } else if ($thisMonth < 1000000000) {
                                                $format = number_format($thisMonth / 1000000) . 'JT';
                                            } else {
                                                $format = number_format($thisMonth / 1000000000, 2) . 'M';
                                            }
                                            echo $format
                                            @endphp
                                        </b>
                                    </span>
                                    <br>
                                    <span class="text-muted"><small>vs {{ $today->today()->subMonth()->format('F Y') }}</small></span>
                                    <span class="float-right">
                                        @if ($persentaseBulan == 0)
                                            -
                                        @elseif ($persentaseBulan < 0)
                                            {{ $persentaseBulan }}%
                                            <i class="fas fa-arrow-alt-circle-down ml-1" style="color:red"></i>
                                        @else
                                            {{ $persentaseBulan }}%
                                            <i class="fas fa-arrow-alt-circle-up ml-1" style="color:rgb(120, 201, 0)"></i>
                                        @endif
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card" style="border-top: 4px solid; border-top-color : orange;">
                            <div class="card-body">
                                <div class="judul">
                                    <span><b>Today</b> | {{ $today->today()->format('d F Y') }}</span>
                                </div>
                                <div class="isi">
                                    <span>Rp</span>
                                    <span style="font-size: 24pt">
                                        <b>
                                            @php
                                            if ($thisDay < 1000000) {
                                                $format = number_format($thisDay);
                                            } else if ($thisDay < 1000000000) {
                                                $format = number_format($thisDay / 1000000) . 'JT';
                                            } else {
                                                $format = number_format($thisDay / 1000000000, 2) . 'M';
                                            }
                                            echo $format
                                            @endphp
                                        </b>
                                    </span>
                                    <br>
                                    <span class="text-muted"><small>vs {{ $today->yesterday()->format('d F Y') }}</small></span>
                                    <span class="float-right">
                                        @if ($persentaseHari == 0)
                                            -
                                        @elseif ($persentaseHari < 0)
                                            {{ number_format($persentaseHari, 2) }}%
                                            <i class="fas fa-arrow-alt-circle-down ml-1" style="color:red"></i>
                                        @else
                                            {{ number_format($persentaseHari, 2) }}%
                                            <i class="fas fa-arrow-alt-circle-up ml-1" style="color:rgb(120, 201, 0)"></i>
                                        @endif
                                        {{-- 30%
                                        <i class="fas fa-arrow-alt-circle-down ml-1" style="color:red"></i> --}}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card" style="border-top: 4px solid; border-top-color : rgb(0, 174, 255);">
                            <div class="card-body">
                                <div class="judul">
                                    <span><b>Best Month</b></span>
                                </div>
                                <div class="isi">
                                    <span>Rp</span>
                                    <span style="font-size: 28pt"><b>1.000</b></span><br>
                                    <span><b>{{ $today->subMonth()->format('F Y') }}</b></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card" style="border-top: 4px solid; border-top-color : rgb(0, 168, 160);">
                            <div class="card-body">
                                <div class="judul">
                                    <span><b>Best Day</b></span>
                                </div>
                                <div class="isi">
                                    <span>Rp</span>
                                    <span style="font-size: 28pt"><b>1.000</b></span><br>
                                    <span><b>{{ $today->yesterday()->format('d F Y') }}</b></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <canvas id="chart1" height="100px" style="height: 100px"></canvas>
                        <script>
                            var ctx = document.getElementById('chart1');
                            var myChart = new Chart(ctx, {
                                type: 'line',
                                data: {
                                    labels: 'cek',
                                    datasets: [{
                                        label: '# of Votes',
                                        data: [{!! json_encode($data)!!}],
                                        borderColor: 'rgb(75, 192, 192)',
                                    }]
                                },
                                options: {
                                    scales: {
                                        y: {
                                            beginAtZero: true
                                        }
                                    }
                                }
                            });
                        </script>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <canvas id="chart2" height="100px"></canvas>
                        <script>
                            var ctx = document.getElementById('chart2');
                            var myChart = new Chart(ctx, {
                                type: 'bar',
                                data: {
                                    labels: 'cek',
                                    datasets: [{
                                        label: '# of Votes',
                                        data: [{!! json_encode($data)!!}],
                                        borderColor: 'rgb(75, 192, 192)',
                                    }]
                                },
                                options: {
                                    indexAxis: 'y',
                                    // Elements options apply to all of the options unless overridden in a dataset
                                    // In this case, we are setting the border of each horizontal bar to be 2px wide
                                    elements: {
                                    bar: {
                                        borderWidth: 2,
                                    }
                                    },
                                    responsive: true,
                                    plugins: {
                                    legend: {
                                        position: 'right',
                                    },
                                    title: {
                                        display: true,
                                        text: 'Chart.js Horizontal Bar Chart'
                                    }
                                    }
                                }
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection