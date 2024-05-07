<table class="table table-striped">
    <thead>
        <tr style="background-color: #74b9ff;">
            <th style="background-color: #74b9ff;"><h1>No</h1></th>
            <th style="background-color: #74b9ff;"><h1>Nama</h1></th>
            <th style="background-color: #74b9ff;"><h1>Qty</h1></th>
            <th style="background-color: #74b9ff;"><h1>Type</h1></th>
            <th style="background-color: #74b9ff;"><h1>Description</h1></th>
            <th style="background-color: #74b9ff;"><h1>Tanggal Input</h1></th>
            <th style="background-color: #74b9ff;"><h1>Tanggal Update</h1></th>
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
            <td>{{ $row->qty ?? '-' }}</td>
            <td>{{ $row->type ?? '-' }}</td>
            <td>{{ $row->description ?? '-' }}</td>
            <td>{{ \Carbon\Carbon::parse($row->created_at)->format('d F Y')  }}</td>
            <td>{{ \Carbon\Carbon::parse($row->updated_at)->format('d F Y')  }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
