@extends('layouts.app')
@livewireStyles
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Form Pengajuan
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-2">
                                        <label for="" class="col-12">Inventory <small
                                                style="color:red">*</small></label>
                                        <select name="product_id[]" id="" class="form-control" required>
                                            <option value="">Pilih</option>
                                            @foreach ($product as $row)
                                                <option value="{{ $row->id }}">{{ $row->name }} ( Stok :
                                                    {{ number_format($row->qty, 0, '.', '.') }} )</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-2">
                                        <label for="" class="col-12">Qty <small style="color:red">*</small></label>
                                        <input type="number" value="" class="form-control" placeholder="Masukan Qty"
                                            name="qty[]" id="" required>
                                    </div>
                                </div>
                            </div>
                            <div class="inputProduct"></div>
                            <div class="mt-3" align="right">
                                <button class="btn btn-light" onclick="addProduct()" type="button">+ Add</button>
                            </div>
                            <div class="mb-2">
                                <label for="" class="col-12">Nama <small style="color:red">*</small></label>
                                <input type="text" value="{{ auth()->user()->name }}" placeholder="Masukan Nama"
                                    class="form-control" name="name" id="" readonly required>
                            </div>
                            <div class="mb-2">
                                <label for="" class="col-12">No Telp <small style="color:red">*</small></label>
                                <input type="text" value="{{ @$data->phone }}" placeholder="Masukan No Telp"
                                    class="form-control" name="phone" id="" required>
                            </div>
                            <div class="mb-2">
                                <label for="" class="col-12">Alamat</label>
                                <textarea type="text" value="{{ @$data->address }}" placeholder="Masukan Alamat" class="form-control" name="address"
                                    id=""></textarea>
                            </div>
                            <div class="mt-3">
                                <button class="btn btn-primary" type="submit">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @livewireScripts
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
        integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.js"
        integrity="sha512-6DC1eE3AWg1bgitkoaRM1lhY98PxbMIbhgYCGV107aZlyzzvaWCW1nJW2vDuYQm06hXrW0As6OGKcIaAVWnHJw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        window.livewire.on('productStore', () => {
            $('#exampleModal').modal('hide');
        });

        let counter = 0;
        let products = `{!! $product !!}`

        function addProduct() {
            var options = "";
            $.each(JSON.parse(products), function(index, value) {
                options += `<option value="${value.id}">${value.name} ( ` + value.qty + `)</option>`
            })
            counter = counter + 1
            console.log(counter);
            $('.inputProduct').append(`
                <div class="row" id=` + counter + `>
                    <div class="col-6">
                        <div class="mb-2">
                            <label for="" class="col-12">Produk <small style="color:red">*</small></label>
                            <select name="product_id[]" class="form-control" required>
                                <option value="">Pilih</option>
                                ` + options + `
                            </select>
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="mb-2">
                            <label for="" class="col-12">Qty <small style="color:red">*</small></label>
                            <input type="number" value="" class="form-control" placeholder="Masukan Qty" name="qty[]" id="" required>
                        </div>
                    </div>
                    <div class="col-1">
                        <div class="mt-4">
                            <button class="btn btn-danger" onclick="deleteProduct(` + counter + `)" type="button">x</button>
                        </div>
                    </div>
                </div>
            `)
        }

        function deleteProduct(val) {
            $('#' + val).remove();
        }

        /* Fungsi formatRupiah */
        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? rupiah : '');
        }
    </script>
@endsection
