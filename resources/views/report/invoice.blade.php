@extends('layouts.app')
@livewireStyles  
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Invoice #{{ $data->id }}
                    </div>
                    <div class="card-body">
                       <form action="" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-4">
                                <div class="">
                                    <small><label for="" class="col-12">Nama :</label></small>
                                    <p>{{ $data->name }}</p>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="text-end">
                                    <small><label for="" class="col-12">Tanggal :</label></small>
                                    <p>{{ \Carbon\Carbon::parse($data->transaction_date)->isoFormat('dddd, DD MMMM YYYY') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="">
                                    <small><label for="" class="col-12">No Telp :</label></small>
                                    <p>{{ $data->phone }}</p>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="text-end">
                                    <small><label for="" class="col-12">Alamat :</label></small>
                                    <p>{{ $data->address }}</p>
                                </div>
                            </div>
                        </div>

                        <div> Berikut adalah rincian informasi transaksi anda : </div>
                        <div class="table table-responsive">
                            <table class="table table-bordered mt-3">
                                <thead>
                                    <tr>
                                        <td>Produk</td>
                                        <td>Qty</td>
                                        <td>Total</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data->hasTrxDetail as $row)
                                    <tr>
                                        <td>{{ $row->hasProduct->name }}</td>
                                        <td>{{ $row->qty }}</td>
                                        <td>{{ $row->qty }}</td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="2">Subtotal</td>
                                        <td>{{ number_format($data->hasTrxDetail->sum('qty'),0,'.','.') }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                       </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @livewireScripts
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.js" integrity="sha512-6DC1eE3AWg1bgitkoaRM1lhY98PxbMIbhgYCGV107aZlyzzvaWCW1nJW2vDuYQm06hXrW0As6OGKcIaAVWnHJw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   
@endsection