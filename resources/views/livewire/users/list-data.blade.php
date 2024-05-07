<div>
    @if (session()->has('message'))
        <div class="alert alert-success" style="margin-top:30px;">x
          {{ session('message') }}
        </div>
    @endif
    <div class="row">
        <div class="col-8">
            <a href="{{ route('user.create') }}" class="btn btn-primary">+ Tambah</a>
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
                <th>Email</th>
                <th>Roles</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $value)
            <tr>
                <td><small> {{ $value->id }}</small></td>
                <td><small> {{ $value->name }}</small></td>
                <td><small> {{ $value->email }}</small></td>
                <td><small> {{ $value->type }}</small></td>
                <td>
                    <small>
                    @if($value->enabled == 1)
                        Aktif
                    @else
                        Tidak Aktif
                    @endif
                    </small>
                </td>
                <td>
                @if($value->enabled == 1)
                <a href="{{ route('user.updateStatus', ['id' => $value->id, 'status' => 0]) }}" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i></a>
                @else
                <a href="{{ route('user.updateStatus', ['id' => $value->id, 'status' => 1]) }}" class="btn btn-success btn-sm"> <i class="fa fa-recycle"></i></a>
                @endif
                <a href="{{ route('user.setRole', ['id' => $value->id]) }}" class="btn btn-secondary btn-sm"> <i class="fa fa-cog"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $data->links('pagination.page') }}
</div>