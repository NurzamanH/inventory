<div>
    @if (session()->has('message'))
        <div class="alert alert-success" style="margin-top:30px;">x
          {{ session('message') }}
        </div>
    @endif
    <div class="row">
        <div class="col-8">
            <a href="{{ route('inventory.create') }}" class="btn btn-primary">+ Tambah</a>
            <form target="_blank" class="mt-3" action="{{ route('inventory.exportExcel') }}" method="POST" enctype="multipart/form-data" id="pot">
                @csrf
                <input type="hidden" value="{{ $this->search }}" name="search"/>
                <button type="submit" class="btn btn-light"><i class="fa fa-download"></i> Export Excel</button>
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
                <th>Type</th>
                <th>Qty</th>
                <th>Deskripsi</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->name }}</td>
                <td>{{ $value->type }}</td>
                <td>{{ $value->qty }}</td>
                <td>{{ $value->description }}</td>
                <td>
                    @if($value->enabled == 1)
                       <small style="color: green;"> Aktif</small>
                    @else
                        <small style="color: red;"> Deleted </small>
                    @endif
                </td>
                <td>
                <a href="{{ route('inventory.edit', ['id' => $value->id]) }}" class="btn btn-primary btn-sm"> <i class="fa fa-edit"></i></a>
                @if($value->enabled == 1)
                <a href="{{ route('inventory.updateStatus', ['id' => $value->id, 'status' => 0]) }}" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i></a>
                @else
                <a href="{{ route('inventory.updateStatus', ['id' => $value->id, 'status' => 1]) }}" class="btn btn-success btn-sm"> <i class="fa fa-recycle"></i></a>
                @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $data->links('pagination.page') }}
</div>