@extends('layouts.admin.master')
@section('content')
    @section('links_content_head')
        @Include('layouts.links.datatable.head')
    @endsection
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{ $module_name }} List</h3>
                        </div>
                        <div class="card-header container-fluid">
                            <form id="list-form" action="{{ route('admin.accounts.transactions.receiving.revenue.list') }}" method="post">
                                @csrf
                                <div class="row d-flex justify-content-center">
                                    <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                        <label>Select Country</label>
                                        <select class="form-control" name="receiving_country" id="search_filter"
                                                style="width: 100%">
                                            <option value="" class="py-1">Sending Country</option>
                                            @forelse($countries as $key => $value)
                                                <option value="{{$value}}">{{$value}}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                        <label>From Date</label>
                                        @if (request()->input('date_from'))
                                            <input type="date" name="date_from" id="" class="form-control"
                                                   value="{{ request()->input('date_from', old('date_from')) }}"
                                                   style="width: 100%">
                                        @else
                                            <input type="date" name="date_from" id="" class="form-control"
                                                   value="" style="width: 100%">
                                        @endif
                                    </div>
                                    <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                        <label>To Date</label>
                                        @if (request()->input('date_to'))
                                            <input type="date" name="date_to" id="" class="form-control"
                                                   value="{{ request()->input('date_to', old('date_to')) }}">
                                        @else
                                            <input type="date" name="date_to" id="" class="form-control"
                                                   value="">
                                        @endif
                                    </div>
                                    <div class="form-group col-lg-1 col-md-1 col-sm-3 col-xs-3">
                                        <label class="invisible">Submit</label>
                                        <button type="submit" name="filter" class="btn form-control"
                                                style="background-color: #091E3E;color: white">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="list-transaction"
                                   class="table table-bordered @php if(!empty($transactions)){echo "table-responsive";}else{} @endphp">
                                <thead>
                                <tr>
                                    <th class="text-capitalize">#</th>
                                    <th class="text-capitalize">Country</th>
                                    <th class="text-capitalize">Count of Tr_No</th>
                                    <th class="text-capitalize">Sum of Volume in GBP</th>
                                    <th class="text-capitalize">Sum Fx in GBP</th>
                                    <th class="text-capitalize">Sum Charges in GBP</th>
                                    <th class="text-capitalize">Sum of SSRL Charges</th>
                                    <th class="text-capitalize">Sum of Net Admin Charges</th>
                                    <th class="text-capitalize">Sum FX Loss</th>
                                    <th class="text-capitalize">Total Revenue</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th class="text-capitalize">#</th>
                                    <th class="text-capitalize">Country</th>
                                    <th class="text-capitalize">Count of Tr_No</th>
                                    <th class="text-capitalize">Sum of Volume in GBP</th>
                                    <th class="text-capitalize">Sum Fx in GBP</th>
                                    <th class="text-capitalize">Sum Charges in GBP</th>
                                    <th class="text-capitalize">Sum of SSRL Charges</th>
                                    <th class="text-capitalize">Sum of Net Admin Charges</th>
                                    <th class="text-capitalize">Sum FX Loss</th>
                                    <th class="text-capitalize">Total Revenue</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    @section('links_content_foot')
        @Include('layouts.links.datatable.foot')
        <script>
            $(function() {
                var searchFilter = ""; //this is for default criteria
                var t = $("#list-transaction").DataTable({
                    "paging": true,
                    "autoWidth": false,
                    "searching": false,
                    "responsive": true,
                    "order": [[0, 'asc']],
                    "aaSorting": [[ 0, "asc" ]],
                    "aLengthMenu": [
                        [10, 25, 50, -1],
                        [10, 25, 50, "All"]
                    ],
                    "pageLength": 10,
                    dom: 'Bfrtip',
                    buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: "{{ route('admin.accounts.transactions.sending.revenue.list') }}",
                        type: 'POST',
                        data: function( d ) {
                            d.data=searchFilter;
                        },
                    },
                    columns: [
                        { data: 'id' },
                        { data: 'sending_country' },
                        { data: 'count_of_tr_no'  },
                        { data: 'vol_in_gbp',"render": function (data, type, row) { return Math.floor(data * 100) / 100; } },
                        { data: 'fx_in_gbp',"render": function (data, type, row) { return Math.floor(data * 100) / 100; } },
                        { data: 'charges_in_gbp',"render": function (data, type, row) { return Math.floor(data * 100) / 100; } },
                        { data: 'charges_in_gbp',"render": function (data, type, row) { return Math.floor(data * 100) / 100; } },
                        { data: 'net_admin_charges_in_gbp',"render": function (data, type, row) { return Math.floor(data * 100) / 100; } },
                        { data: 'fx_loss' ,"render": function (data, type, row) { return Math.floor(data * 100) / 100; }},
                        { data: 'total_revenue_in_gbp' ,"render": function (data, type, row) { return Math.floor(data * 100) / 100; }},
                    ],
                })


                $("#list-form").on("submit", function (event) {
                    event.preventDefault();
                    searchFilter = $('#list-form').serializeObject();
                    t.ajax.reload(null, true)
                });

            });
        </script>
    @endsection
@endsection
