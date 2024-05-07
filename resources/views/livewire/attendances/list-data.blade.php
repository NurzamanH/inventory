<div>
    @if (session()->has('message'))
        <div class="alert alert-success" style="margin-top:30px;">x
          {{ session('message') }}
        </div>
    @endif
    <div class="row">
        <div class="col-8">
            <a href="{{ route('attendance.create') }}" class="btn btn-primary">+ Tambah</a>
            <form class="mt-3" action="{{ route('attendance.importExcel') }}" method="POST" enctype="multipart/form-data" id="pot">
                @csrf
                <input type="file" id="file" style="display: none" name="files" accept=".xlsx, .xls, .csv" onchange="event.preventDefault(); document.getElementById('pot').submit();" />
                <a type="button" onclick="event.preventDefault(); document.getElementById('file').click();" class="btn btn-light"><i class="fa fa-upload"></i> Import Excel</a>
                <a href="{{ asset('attendance_templates.xlsx') }}" class="btn btn-light"><i class="fa fa-download"></i> Download</a>
            </form>

        </div>
        <div class="col-4">
            <input type="text" wire:model="search" placeholder="Search....." class="form-control" name="" id="">
        </div>
    </div>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Status</th>
                <th>Terlambat</th>
                <th>Lembur</th>
                <th>Keterangan</th>
                <th>Tanggal</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->name }}</td>
                <td>{{ $value->status }}</td>
                <td>{{ $value->is_late }}</td>
                <td>{{ $value->is_overtime }}</td>
                <td>{{ $value->noted}}</td>
                <td>{{ \Carbon\Carbon::parse($value->date)->isoFormat('dddd, DD MMMM YYYY H:mm') }}</td>
                <td>
                <a href="{{ route('attendance.edit', ['id' => $value->id]) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> </a>
                <a href="{{ route('attendance.delete', ['id' => $value->id]) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $data->links('pagination.page') }}
</div>