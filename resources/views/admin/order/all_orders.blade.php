<x-app-layout></x-app-layout>
<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/public">
    @include('admin.header')
</head>
<body>
<div class="container-scroller">
    <!-- partial:partials/_sidebar.html -->
    @include('admin.order.sidebar')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin.order.navbar')
        <!-- partial -->
        <div class = "main-panel">
            <div class = "content-wrapper">

                <h1 class="display-1" style="text-align:center">Orders</h1>
                <div class="text-left">
                    Filter:
                    <a href="/all_orders" class="btn btn-primary">All Orders</a>
                    <a href="{{url('sort_order',0)}}" class="btn btn-primary">Pending</a>
                    <a href="{{url('sort_order',1)}}" class="btn btn-primary">Authorized</a>
                    <a href="{{url('sort_order',2)}}" class="btn btn-primary">Shipping</a>
                    <a href="{{url('sort_order',3)}}" class="btn btn-primary">Shipped</a>
                    <a href="{{url('sort_order',4)}}" class="btn btn-primary">Canceled</a>
                </div>
                <br>
                <table class="table table-dark">
                    <thead>
                    <tr>
                        <th scope="col">Order's ID</th>
                        <th scope="col">Customer's Name</th>
                        <th scope="col">Status</th>
                        <th scope="col">Total Price</th>
                        <th scope="col">Action</th>


                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $data)

                        <tr>
                            <th scope="row">{{$data->id}}</th>
                            <td>{{App\Models\User::find($data->customer_id)->name}}</td>


                            @if($data->status == 0)
                                <td><div  class="badge badge-outline-warning">Pending</div></td>
                                @elseif($data->status == 1)
                                <td><div class="badge badge-outline-primary">Authorized</div></td>
                            @elseif($data->status == 2)
                                <td><div class="badge badge-outline-info">Shipping</div></td>
                            @elseif($data->status == 3)
                                <td> <div class="badge badge-outline-success">Shipped</div></td>
                            @elseif($data->status == 4)
                                <td> <div class="badge badge-outline-danger">Canceled</div></td>
                            @endif
                            @php($details = App\Models\Order_Details::where('order_id', '=', $data->id)->get())
                            @php($total = 0)
                            @foreach($details as $detail)
                            @php($total += $detail->price * $detail->quantity)
                                @endforeach
                            <td>${{$total}}</td>
                            <td>
                                <a href="{{url('edit_orders',$data->id)}}" class="btn btn-primary">Details</a>
                                <a onclick="return confirm('Are you sure to delete this order?')"
                                   href="{{url('delete_order',$data->id)}}" class="btn btn-danger">Delete</a>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
@include('admin.scripts')
</body>
</html>


