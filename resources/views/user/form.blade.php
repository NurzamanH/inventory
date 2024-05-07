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
                            <label for="" class="col-12">Tipe <small style="color:red">*</small></label>
                            <select name="type" id="" class="form-control" required>
                                <option value="">--- Pilih ---</option>
                                <option value="admin">Admin</option>
                                <option value="karyawan">Karyawan</option>
                                <option value="kepala_divisi">Kepala Divisi</option>
                            </select>
                        </div>
                        <div class="mb-2">
                            <label for="" class="col-12">Nama <small style="color:red">*</small></label>
                            <input type="text" value="{{ @$data->name }}" class="form-control" placeholder="Masukan Nama" name="name" id="" required>
                        </div>
                        <div class="mb-2">
                            <label for="" class="col-12">Email <small style="color:red">*</small></label>
                            <input type="email" value="{{ @$data->email }}" class="form-control" placeholder="Masukan Email" name="email" id="" required>
                        </div>
                        <div class="mb-2">
                            <label for="" class="col-12">Password <small style="color:red">*</small></label>
                            <input type="password" value="{{ @$data->password }}" class="form-control" placeholder="Masukan No Telp" name="password" id="" required>
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