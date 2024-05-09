<div>
    @if (session()->has('message'))
        <div class="alert alert-success" style="margin-top:30px;">x
            {{ session('message') }}
        </div>
    @endif
    <div class="row">
        <div class="col-8">
            <a href="{{ route('pengajuan.create') }}" class="btn btn-primary">+ Tambah</a>
        </div>
        <div class="col-4">
            <input type="text" wire:model="search" placeholder="Search....." class="form-control" name=""
                id="">
        </div>
    </div>
    <div class="table table-responsive">
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Rincian Produk</th>
                    <th>Total</th>
                    <th>Tgl Pengajuan</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $value)
                    <tr>
                        <td><small>{{ $value->id }}</small></td>
                        <td>
                            <small>{{ $value->name }}</small>
                            <p><small>{{ $value->phone }}</small></p>
                        </td>
                        <td>
                            <small>
                                @foreach ($value->hasTrxDetail as $row)
                                    <p>- {{ $row->hasProduct->name }} | {{ $row->qty }}pcs</p>
                                @endforeach
                            </small>
                        </td>
                        <td><small> {{ number_format($value->hasTrxDetail->sum('qty'), 0, '.', '.') }} pcs</small></td>
                        <td><small>
                                {{ \Carbon\Carbon::parse($value->transaction_date)->isoFormat('dddd, DD MMMM YYYY') }}</small>
                        </td>
                        <td>
                            @if ($value->enabled == 1)
                                <small style="color: green;"> Aktif</small>
                            @else
                                <small style="color: red;"> Deleted </small>
                            @endif
                        </td>
                        <td>
                            @if ($value->status == 'Approve')
                                <small style="color: green;"> Disetujui</small>
                            @elseif($value->status == 'Pending')
                                <small style="color: blue;"> Menunggu Persetujuan</small>
                                @if (auth()->user()->type == 'kepala_divisi')
                                    <br>
                                    <a href="{{ route('pengajuan.updateStatusPengajuan', ['id' => $value->id, 'status' => 'Approve']) }}"
                                        class="text text-success "><i class="fa fa-check-circle"></i> Setujui</a>
                                    <a href="{{ route('pengajuan.updateStatusPengajuan', ['id' => $value->id, 'status' => 'Reject']) }}"
                                        class="text text-danger "><i class="fa fa-times-circle"></i> Tolak</a>
                                @endif
                            @else
                                <small style="color: red;"> Ditolak </small>
                            @endif
                        </td>
                        <td>
                            @if ($value->enabled == 1)
                                <a href="{{ route('pengajuan.updateStatus', ['id' => $value->id, 'status' => 0]) }}"
                                    class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> </a>
                            @else
                                <a href="{{ route('pengajuan.updateStatus', ['id' => $value->id, 'status' => 1]) }}"
                                    class="btn btn-success btn-sm"><i class="fa fa-recycle"></i> </a>
                            @endif
                            <a href="{{ route('pengajuan.invoice', ['id' => $value->id]) }}"
                                class="btn btn-primary btn-sm"><i class="fa fa-file"></i> </a>
                            <a href="{{ route('pengajuan.exportPDF', ['id' => $value->id]) }}" target="_blank"
                                class="btn btn-warning btn-sm"><i class="fa fa-file-pdf-o "></i> </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $data->links('pagination.page') }}
</div>
