@extends('layouts.admin.master')
@section('content')
@section('links_content_head')
    @Include('layouts.links.datatable.head')
@endsection
<!-- Main content -->
<section class="content">
@livewire('transactions.upload-transaction-data')
</section>
<!-- /.content -->


@section('links_content_foot')
    @Include('layouts.links.datatable.foot')
    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>
@endsection
@endsection
