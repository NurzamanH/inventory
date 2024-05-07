@extends('layouts.app')
@livewireStyles  
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Form Absensi
                    </div>
                    <div class="card-body">
                       <form action="" method="POST">
                        @csrf
                        <div class="mb-2">
                            <label for="" class="col-12">Nama <small style="color:red">*</small></label>
                            <input type="text" value="{{ @$data->name }}" class="form-control" placeholder="Masukan Nama" name="name" id="" required>
                        </div>
                        <div class="mb-2">
                            <label for="" class="col-12">Tanggal <small style="color:red">*</small></label>
                            <input type="datetime-local" value="{{ @$data->date }}" class="form-control" placeholder="Masukan Tanggal" name="date" id="" required>
                        </div>
                        <div class="mb-2">
                            <label for="" class="col-12">Status  <small style="color:red">*</small></label>
                            <select name="status" class="form-control" id="" required>
                                <option value="Hadir" {{ @$data->status == "Hadir" ? 'selected' : '' }}>Hadir</option>
                                <option value="Alpa" {{ @$data->status == "Alpa" ? 'selected' : '' }}>Alpa</option>
                                <option value="Izin" {{ @$data->status == "Izin" ? 'selected' : '' }}>Izin</option>
                            </select>
                        </div>
                        <div class="mb-2">
                            <label for="" class="col-12">Terlambat  <small style="color:red">*</small></label>
                            <select name="is_late" class="form-control" id="" required>
                                <option value="Ya" {{ @$data->is_late == "Ya" ? 'selected' : '' }}>Ya</option>
                                <option value="Tidak" {{ @$data->is_late == "Tidak" ? 'selected' : '' }}>Tidak</option>
                            </select>
                        </div>
                        <div class="mb-2">
                            <label for="" class="col-12">Lembur  <small style="color:red">*</small></label>
                            <select name="is_overtime" class="form-control" id="" required>
                                <option value="Ya" {{ @$data->is_overtime == "Ya" ? 'selected' : '' }}>Ya</option>
                                <option value="Tidak" {{ @$data->is_overtime == "Tidak" ? 'selected' : '' }}>Tidak</option>
                            </select>
                        </div>
                        <div class="mb-2">
                            <label for="" class="col-12">Keterangan </label>
                            <textarea type="datetime-local" value="{{ @$data->noted }}" class="form-control" placeholder="Masukan Keterangan" name="noted" id="">{{ @$data->noted }}</textarea>
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