<div>
    @if (session()->has('message'))
        <div class="alert alert-success" style="margin-top:30px;">x
          {{ session('message') }}
        </div>
    @endif
    <div class="row">
        <div class="col-8">
            <a href="{{ route('customer.create') }}" class="btn btn-primary">+ Tambah</a>
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
                <th>No Telp</th>
                <th>Alamat</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->name }}</td>
                <td>{{ $value->phone }}</td>
                <td>{{ $value->address}}</td>
                <td>
                <a href="{{ route('customer.edit', ['id' => $value->id]) }}" class="btn btn-primary btn-sm">Edit</a>
                <button wire:click="delete({{ $value->id }})" class="btn btn-danger btn-sm">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $data->links('pagination.page') }}
</div>