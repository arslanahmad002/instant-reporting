@extends('layouts.admin.master')
@section('content')
@section('links_content_head')
    @Include('layouts.links.datatable.head')
@endsection
@section('content_1')
    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 mt-2">
        <!-- Button trigger modal -->
        @if ($create == 1)
            <a href="{{ route('admin.upload_data.transactions.create') }}" class="border px-2 btn"
                style="background-color: #091E3E;color: white">
                Upload Transaction Data
            </a>
        @endif
    </div>
@endsection
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        @if (session('failed'))
            <div id="failed" class="alert alert-default-danger alert-dismissible fade show" role="alert">
                <strong>{{ session('failed') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header row">
                        <h3 class="card-title col-lg-6 col-md-6 col-sm-6 col-xs-6">Transactions List</h3>
                    </div>
                    <div class="card-header container-fluid">
                        <form id="list-form" action="{{ route('admin.upload_data.transactions.filter.index') }}" method="post">
                            <div class="row d-flex justify-content-center">
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
                                    <label class="invisible">Filter</label>
                                    <button type="submit" name="filter" class="btn form-control"
                                        style="background-color: #091E3E;color: white">Submit</button>
                                </div>
                            </div>

                        </form>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="list-transaction"
                            class="table table-bordered @php if(request()->input('date_from') || request()->input('date_to')){echo "
                                    table-responsive";}else{} @endphp">
                            <thead>
                                <tr>
                                    <th class="text-capitalize">ID</th>
                                    <th class="text-capitalize">Paid Date</th>
                                    <th class="text-capitalize">Agent Name</th>
                                    <th class="text-capitalize">Admin Charges</th>
                                    <th class="text-capitalize">Buyer</th>
                                    <th class="text-capitalize">Method</th>
                                    <th class="text-capitalize">Sending Country</th>
                                    <th class="text-capitalize">Status</th>
                                    <th class="text-capitalize">Customer ID</th>
                                    <th class="text-capitalize">Customer Name</th>
                                    <th class="text-capitalize">Trans Id</th>
                                    <th class="text-capitalize">Recipient</th>
                                    <th class="text-capitalize">Father Name</th>
                                    <th class="text-capitalize">Phone</th>
                                    <th class="text-capitalize">Address</th>
                                    <th class="text-capitalize">City</th>
                                    <th class="text-capitalize">Code</th>
                                    <th class="text-capitalize">Currency</th>
                                    <th class="text-capitalize">Fc Amount</th>
                                    <th class="text-capitalize">Rate</th>
                                    <th class="text-capitalize">Pounds</th>
                                    <th class="text-capitalize">Payment No</th>
                                    <th class="text-capitalize">Date</th>
                                    <th class="text-capitalize">Agent Charges</th>
                                    <th class="text-capitalize">Buyer Rate</th>
                                    <th class="text-capitalize">Buyer Rate SC</th>
                                    <th class="text-capitalize">Buyer Rate Dc</th>
                                    <th class="text-capitalize">Receiving Country</th>

                                </tr>
                            </thead>

                            <tfoot>
                            <tr>
                                <th class="text-capitalize">ID</th>
                                <th class="text-capitalize">Paid Date</th>
                                <th class="text-capitalize">Agent Name</th>
                                <th class="text-capitalize">Admin Charges</th>
                                <th class="text-capitalize">Buyer</th>
                                <th class="text-capitalize">Method</th>
                                <th class="text-capitalize">Sending Country</th>
                                <th class="text-capitalize">Status</th>
                                <th class="text-capitalize">Customer ID</th>
                                <th class="text-capitalize">Customer Name</th>
                                <th class="text-capitalize">Trans Id</th>
                                <th class="text-capitalize">Recipient</th>
                                <th class="text-capitalize">Father Name</th>
                                <th class="text-capitalize">Phone</th>
                                <th class="text-capitalize">Address</th>
                                <th class="text-capitalize">City</th>
                                <th class="text-capitalize">Code</th>
                                <th class="text-capitalize">Currency</th>
                                <th class="text-capitalize">Fc Amount</th>
                                <th class="text-capitalize">Rate</th>
                                <th class="text-capitalize">Pounds</th>
                                <th class="text-capitalize">Payment No</th>
                                <th class="text-capitalize">Date</th>
                                <th class="text-capitalize">Agent Charges</th>
                                <th class="text-capitalize">Buyer Rate</th>
                                <th class="text-capitalize">Buyer Rate SC</th>
                                <th class="text-capitalize">Buyer Rate Dc</th>
                                <th class="text-capitalize">Receiving Country</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@section('links_content_foot')
    @Include('layouts.links.datatable.foot')
    <script>
        $(function() {
            var searchFilter = ""; //this is for default criteria
           var t = $("#list-transaction").DataTable({
                "paging": true,
                "autoWidth": false,
                "searching": true,
                "responsive": true,
                "order": [[0, 'asc']],
                "aaSorting": [[ 0, "asc" ]],
                "aLengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                "pageLength": 10,
                processing: true,
                serverSide: true,
                ajax: {
                   url: "{{ url('/admin/upload_data/transactions/list') }}",
                    type: 'POST',
                    data: function( d ) {
                        d.data=searchFilter;
                    },
                },
                columns: [
                    { data: 'id' },
                    { data: 'paid_date' },
                    { data: 'agent_name' },
                    { data: 'admin_charges' },
                    { data: 'buyer' },
                    { data: 'bene_payment_method' },
                    { data: 'sending_country' },
                    { data: 'status' },
                    { data: 'customer_id' },
                    { data: 'customer_name' },
                    { data: 'transaction_id' },
                    { data: 'recipient' },
                    { data: 'father_name' },
                    { data: 'phone' },
                    { data: 'address' },
                    { data: 'city' },
                    { data: 'code' },
                    { data: 'currency' },
                    { data: 'fc_amount' },
                    { data: 'rate' },
                    { data: 'pounds' },
                    { data: 'payment_no' },
                    { data: 'date' },
                    { data: 'agent_charges' },
                    { data: 'buyer_rate' },
                    { data: 'buyer_rate_sc' },
                    { data: 'buyer_rate_dc' },
                    { data: 'receiving_country' },
                ],
            })


            $("#list-form").on("submit", function (event) {
                event.preventDefault();
                 searchFilter = $('#list-form').serializeObject();
               t.ajax.reload()
            });

        });
    </script>
@endsection
@endsection
