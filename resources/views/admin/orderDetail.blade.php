@extends('admin.layouts.default')

@section('content')
    <!-- Page Content -->
    <div class="content">
        <h2 class="content-heading pt-0">Order Details</h2>
        <div class="block">
            <div class="block-content">
                <div class="row">
                    <div class="col mb-3" align="right">
                        <a href="{{ url('admin/order') }}" class="btn btn-alt-danger">Back</a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <h6>General Details</h6>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <td>Order Date Time</td>
                                    <td>{{ date('d-m-Y h:i:s A',strtotime($order->created_at)) }}</td>
                                </tr>
                                <tr>
                                    <td>Order ID</td>
                                    <td>{{ $order->order_id }}</td>
                                </tr>
                                <tr>
                                    <td>Payment Method</td>
                                    <td class="text-capitalize">{{ $order->payment_method }}</td>
                                </tr>
                                <tr>
                                    <td>Order Status</td>
                                    <td class="text-capitalize">{{ $order->order_status }}</td>
                                </tr>
                                <tr>
                                    <td>Order ID</td>
                                    <td>{{ $order->order_id }}</td>
                                </tr>
                                <tr>
                                    <td>Customer Status</td>
                                    <td class="text-capitalize">{{ $order->checkout_as }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="col-md-6">
                        <h6>Billing Details</h6>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <td>First Name</td>
                                    <td>{{ $order->firstname }}</td>
                                </tr>
                                <tr>
                                    <td>Last Name</td>
                                    <td>{{ $order->lastname }}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>{{ $order->email }}</td>
                                </tr>
                                <tr>
                                    <td>Mobile No.</td>
                                    <td>{{ $order->mobileno }}</td>
                                </tr>
                                <tr>
                                    <td>Address Line 1</td>
                                    <td>{{ $order->address1 }}</td>
                                </tr>
                                <tr>
                                    <td>Zipcode</td>
                                    <td>{{ $order->zipcode }}</td>
                                </tr>
                                <tr>
                                    <td>Address Line 2</td>
                                    <td>{{ $order->address2 }}</td>
                                </tr>
                                <tr>
                                    <td>City</td>
                                    <td>{{ $order->city }}</td>
                                </tr>
                                <tr>
                                    <td>State</td>
                                    <td>{{ $order->state }}</td>
                                </tr>
                                <tr>
                                    <td>Country</td>
                                    <td>{{ $order->country }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="col-md-12">
                        <h6>Product Details</h6>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Unit Prict</th>
                                    <th>Qty</th>
                                    <th>Sub Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $total = 0; ?>
                                @foreach($products as $product)
                                <?php 
                                    $subTotal = $product->unit_price * $product->qty; 
                                    $total += $subTotal;
                                ?>
                                <tr>
                                    <td>{{ $product->product_name }}</td>
                                    <td>{{ $product->unit_price }}</td>
                                    <td>{{ $product->qty }}</td>
                                    <td>{{ $subTotal }}</td>
                                </tr>
                                @endforeach

                                <tr>
                                    <th colspan="3">Sub Total</th>
                                    <td>{{ $total }}</td>
                                </tr>
                                <tr>
                                    <th colspan="3">Shipping Charge</th>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <th colspan="3">Grand Total</th>
                                    <td>{{ $total }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Page Content -->
@endsection