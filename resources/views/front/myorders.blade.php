<?php $site_title = DB::table('options')->where('key', '=', 'site_title')->first(); ?>

@extends('front.layouts.default')

@section('css_before')
    <title>My Orders | {{ $site_title->value }}</title>
@endsection

@section('content')
    <section class="bg-title-page flex-col-c-m" style="background-image: url({{ asset('front/images/custom-page-header.jpg') }});">
        <h2 class="text-white font-weight-bold"> My Orders </h2>
    </section>

    <section class="bgwhite p-t-60">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-lg-3 p-b-75">
                    @include('front.include.customerSidebar')
                </div>
                <div class="col-md-8 col-lg-9 p-b-75">
                    @if(Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    
                    @if(!empty($orders))
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Order Date</th>
                                <th>Order ID</th>
                                <th>Order Status</th>
                                <th>View</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            <tr>
                                <td>{{ date('d-m-Y', strtotime($order->created_at)) }}</td>
                                <td>{{ $order->order_id }}</td>
                                <td class="text-capitalize">{{ $order->order_status }}</td>
                                <td><a href="{{ url('/myaccount/order/'.$order->id) }}" class="btn btn-sm btn-secondary bgblack"><i class="fa fa-eye"></i></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <p>No order found.</p>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
