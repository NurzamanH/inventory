@extends('layouts.app')
@livewireStyles  
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Form Account
                    </div>
                    <div class="card-body">
                       <form action="" method="POST">
                        @csrf
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
                            <input type="password" value="" class="form-control" placeholder="Masukan Password Baru " name="password" id="" required>
                        </div>
                        <hr>
                        <p>Akses Menu</p>
                        @foreach($menu as $row)
                        <div class="mb-2">
                            <input type="checkbox" name="menu_id[]" value="{{ $row->id }}" id="" {{ @$data->hasMenu($data->id, $row->id) ? 'checked' : '' }}>
                            <label for="" class="">{{ $row->name }} </label>
                        </div>
                        @endforeach
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