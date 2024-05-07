<div>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    @if (session()->has('message'))
        <div class="alert alert-success" style="margin-top:30px;">x
          {{ session('message') }}
        </div>
    @endif
    <div class="row mb-2">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                     Total Penjualan
                    <p><h4><i class="fa fa-line-chart"></i> {{ number_format($statsTotalPengajuan,0,'.','.') }}</h4></p>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    Pengajuan yang disetujui
                    <p><h4><i class="fa fa-bar-chart"></i>  {{ $statsTotalPengajuanApprove }}</h4></p>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    Karyawan yang Mengajukan
                    <p><h4> <i class="fa fa-users"></i> {{ $statsTotalEmployee }}</h4></p>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row mb-1">
                <div class="col-3">
                    <input type="text" wire:model="search" placeholder="Search....." class="form-control" name="" id="">
                </div>
                <div class="col-2">
                    <input type="text" name="dates" style="width:300px"  class="form-control form-control round">
                </div>
            </div>
            <div class="col-2">
                <form target="_blank" class="mt-3" action="{{ route('report.exportExcel') }}" method="POST" enctype="multipart/form-data" id="pot">
                    @csrf
                    <input type="hidden" value="{{ $this->search }}" name="search"/>
                    <button type="submit" class="btn btn-light"><i class="fa fa-download"></i> Export Excel</button>
                </form>
            </div>
            <div class="table table-responsive">
                <table class="table table-bordered mt-3">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Rincian Produk</th>
                        <!-- <th>Total</th> -->
                        <th>Tgl Transaksi</th>
                        <th>Status</th>
                        <th>Status Pengajuan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $value)
                    <tr>
                        <td><small>{{ $value->id }}</small></td>
                        <td>
                            <small>{{ $value->name }}</small>
                            <p><small>{{$value->phone}}</small></p>
                        </td>
                        <td>
                            <small>
                            @foreach($value->hasTrxDetail as $row)
                                <p>- {{ $row->hasProduct->name }} | {{ $row->qty }}pcs | Rp{{ number_format($row->amount,0,'.','.') }}</p>
                            @endforeach
                            </small>
                        </td>
                        <!-- <td><small> Rp{{ number_format($value->hasTrxDetail->sum('amount'),0,'.','.') }}</small></td> -->
                        <td><small> {{ \Carbon\Carbon::parse($value->transaction_date)->isoFormat('dddd, DD MMMM YYYY') }}</small></td>
                        <td>
                            @if($value->enabled == 1)
                            <small style="color: green;"> Aktif</small>
                            @else
                                <small style="color: red;"> Deleted </small>
                            @endif
                        </td>
                        <td>
                            @if($value->status == 'Approve')
                                <small style="color: green;"> Disetujui</small>
                            @elseif($value->status == 'Pending')
                                <small style="color: blue;"> Menunggu Persetujuan</small>   
                            @else
                                <small style="color: red;"> Ditolak </small>
                            @endif
                        </td>
                        <td>
                        <a href="{{ route('report.invoice', ['id' => $value->id]) }}" class="btn btn-primary btn-sm"><i class="fa fa-file"></i> </a>
                        <a href="{{ route('report.exportPDF', ['id' => $value->id]) }}" target="_blank" class="btn btn-warning btn-sm"><i class="fa fa-file-pdf-o "></i> </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
            {{ $data->links('pagination.page') }}
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.js" integrity="sha512-8Z5++K1rB3U+USaLKG6oO8uWWBhdYsM3hmdirnOEWp8h2B1aOikj5zBzlXs8QOrvY9OxEnD2QDkbSKKpfqcIWw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script>
        var start_date = `{{$request['start_date']}}`
        var end_date = `{{$request['end_date']}}`

        var start = moment(start_date);
        var end = moment(end_date);

        function cb(start, end) {
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }

        $('input[name="dates"]').daterangepicker({
            startDate: start,
            endDate: end,
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
                'Last 365 Days': [moment().subtract(365, 'days'), moment()],
            },
            "showCustomRangeLabel": false,
            "alwaysShowCalendars": true,
            "applyButtonClasses": "btn-info",
            "cancelClass": "btn-outline-info",
            "showWeekNumbers": true,

        }, cb);

        cb(start, end);

        $('input[name="dates"]').on('cancel.daterangepicker', function(ev, picker) {
            $(this).val('');
        });

    </script>
    <script type="text/javascript">
        $( function() {
            $('input[name="dates"]').change(function(e){
                livewire.emit('searchDates', e.target.value)
            });
        });

    </script>
</div>