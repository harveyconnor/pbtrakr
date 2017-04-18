@extends('layouts.app')
@section('pageTitle', 'My Results')
@section('styles')
<link href="{{ asset('plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h4 class="page-title">View All Results</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">

                <h4 class="header-title m-t-0 m-b-30">My Results</h4>

                <div class="row">
                    <div class="col-lg-12">
                        <results-index></results-index>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#datatable').DataTable();
        } );

    </script>
@endsection