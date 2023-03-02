@extends('admin.body.app')

@section('main')
@section('title')
    Admin - Dashboard
@endsection
@php

            $checkin = App\Models\Order::where('status', 'valid')
                ->get()
                ->count();
            $checkout = App\Models\Order::where('status', 'expired')
                ->get()
                ->count();

@endphp
<section class="content">
    <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                <div class="info-box-content">
                <span class="info-box-text">Check In</span>
                <span class="info-box-number">{{$checkin}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            </div>

            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
    
                    <div class="info-box-content">
                    <span class="info-box-text">Check Out</span>
                    <span class="info-box-number">{{$checkout}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
                </div>
        <!-- /.col -->
    </div>
    <!--/. container-fluid -->
</section>
    @endsection