@extends('layouts.app')
@section('pageTitle', 'Add a New Result')
@section('styles')
<link href="{{ asset('plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h4 class="page-title">Add a New Result</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">

                <h4 class="header-title m-t-0 m-b-30">New Result Form</h4>

                <div class="row">
                    <div class="col-lg-12">
                        <results-create></results-create>
                    </div>
                </div><!-- end row -->
            </div>
        </div><!-- end col -->
    </div>
@endsection
@section('scripts')
<script src="{{ asset('plugins/autoNumeric/autoNumeric.js') }}"></script>
<script src="{{ asset('plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script type="text/javascript">
    jQuery(function ($) {
        $('.autonumber').autoNumeric('init');
    });
    jQuery('#datepicker-autoclose').datepicker({
        autoclose: true,
        todayHighlight: true
    });
</script>
@endsection