@extends('layouts.app')
@section('pageTitle', 'Dashboard')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h4 class="page-title">Dashboard</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">

                <h4 class="header-title m-t-0 m-b-30">Welcome</h4>

                <div class="row">
                    <div class="col-lg-12">
                        Hi, {{ Auth::user()->first_name." ".Auth::user()->last_name }}
                    </div>
                </div><!-- end row -->
            </div>
        </div><!-- end col -->
    </div>
@endsection
