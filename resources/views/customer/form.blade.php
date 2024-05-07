@extends('layouts.app')
@livewireStyles  
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Form Produk
                    </div>
                    <div class="card-body">
                       <form action="" method="POST">
                        @csrf
                        <div class="mb-2">
                            <label for="" class="col-12">Nama <small style="color:red">*</small></label>
                            <input type="text" value="{{ @$data->name }}" class="form-control" placeholder="Masukan Nama" name="name" id="" required>
                        </div>
                        <div class="mb-2">
                            <label for="" class="col-12">No Telp <small style="color:red">*</small></label>
                            <input type="text" value="{{ @$data->phone }}" class="form-control" placeholder="Masukan No Telp" name="phone" id="" required>
                        </div>
                        <div class="mb-2">
                            <label for="" class="col-12">Alamat </label>
                            <textarea type="text" class="form-control" placeholder="Masukan Deskripsi" name="address" id="">{{ @$data->address }}</textarea>
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
    <script type="text/javascript">
        window.livewire.on('productStore', () => {
            $('#exampleModal').modal('hide');
        });
    </script>
@endsection