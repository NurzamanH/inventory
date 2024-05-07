<table class="table table-striped">
    <thead>
        <tr style="background-color: #74b9ff;">
            <th style="background-color: #74b9ff;"><h1>No</h1></th>
            <th style="background-color: #74b9ff;"><h1>Nama</h1></th>
            <th style="background-color: #74b9ff;"><h1>Rincian Product</h1></th>
            <th style="background-color: #74b9ff;"><h1>Total</h1></th>
            <th style="background-color: #74b9ff;"><h1>Tanggal Transaksi</h1></th>
            <th style="background-color: #74b9ff;"><h1>Status</h1></th>
            <th style="background-color: #74b9ff;"><h1>Status Pengajuan</h1></th>
        </tr>
    </thead>
    <tbody>
        @php
        $i= 1;
        @endphp
        @foreach($data as $row)
        <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $row->name ?? '-' }}</td>
            <td>
                @foreach($row->hasTrxDetail as $rows)
                <p>- {{ $rows->hasProduct->name }} | {{ $rows->qty }}pcs</p>
                @endforeach
            </td>
            <td>{{ number_format($row->hasTrxDetail->sum('qty'),0,'.','.') }}</td>
            <td>{{ \Carbon\Carbon::parse($row->transaction_date)->format('d F Y')  }}</td>
            <td>
                @if($row->enabled == 1)
                    <small style="color: green;"> Aktif</small>
                @else
                    <small style="color: red;"> Deleted </small>
                @endif
            </td>
            <td>
                @if($row->status == 'Approve')
                    <small style="color: green;"> Disetujui</small>
                @elseif($row->status == 'Pending')
                    <small style="color: blue;"> Menunggu Persetujuan</small>   
                @else
                    <small style="color: red;"> Ditolak </small>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
