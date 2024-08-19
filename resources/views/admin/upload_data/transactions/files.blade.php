@extends('layouts.admin.master')
@section('content')
@section('links_content_head')
    @Include('layouts.links.datatable.head')
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
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header row">
                        <h3 class="card-title col-lg-6 col-md-6 col-sm-6 col-xs-6">Transaction Files List</h3>
                    </div>
                    <div class="card-body">
                        <table id="list-transaction"
                            class="table table-bordered @php if(request()->input('date_from') || request()->input('date_to')){echo "
                                    table-responsive";}else{} @endphp">
                            <thead>
                                <tr>
                                    <th class="text-capitalize">ID</th>
                                    <th class="text-capitalize">Date</th>
                                    <th class="text-capitalize">File Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data??[] as $row)
                                    <tr>
                                        <td>{{$row->id}}</td>
                                        <td>{{$row->date}}</td>
                                        <td>{{$row->file_name}}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3">No Record Found</td>
                                    </tr>
                                @endforelse
                            </tbody>
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
        $(document).ready(function() {
            $('#list-transaction').DataTable();
        } );
    </script>
@endsection
@endsection
