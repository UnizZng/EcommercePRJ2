<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <base href="/public">
    <title>UnizZ's Store</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    @include('home.assets')
</head>

<body>
<!-- Topbar Start -->
@include('home.topbar')
<!-- Topbar End -->
@if(session()->has('message'))

    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
        {{session()->get('message')}}
    </div>
@endif


<h1 class="display-1" style="text-align:center">Orders</h1>
<div class="text-center">
    <a href="/user_order" class="btn btn-primary">All Orders</a>
    <a href="{{url('sort_order_customer',0)}}" class="btn btn-primary">Pending</a>
    <a href="{{url('sort_order_customer',1)}}" class="btn btn-primary">Authorized</a>
    <a href="{{url('sort_order_customer',2)}}" class="btn btn-primary">Shipping</a>
    <a href="{{url('sort_order_customer',3)}}" class="btn btn-primary">Shipped</a>
    <a href="{{url('sort_order_customer',4)}}" class="btn btn-primary">Canceled</a>
</div>
<br>
<table class="table text-center">
    <thead>
    <tr>
        <th scope="col">Order's ID</th>
        <th scope="col">Status</th>
        <th scope="col">Total Price</th>
        <th scope="col">Action</th>


    </tr>
    </thead>
    <tbody>
    @foreach($orders as $data)

        <tr>
            <th scope="row">{{$data->id}}</th>
            @if($data->status == 0)
                <td><div  class="text-warning">Pending</div></td>
            @elseif($data->status == 1)
                <td><div class="text-primary">Authorized</div></td>
            @elseif($data->status == 2)
                <td><div class="text-info">Shipping</div></td>
            @elseif($data->status == 3)
                <td> <div class="text-success">Shipped</div></td>
            @elseif($data->status == 4)
                <td> <div class="text-danger">Canceled</div></td>
            @endif
            @php($details = App\Models\Order_Details::where('order_id', '=', $data->id)->get())
            @php($total = 0)
            @foreach($details as $detail)
                @php($total += $detail->price * $detail->quantity)
            @endforeach
            <td><div class="text-success">${{$total}}</div></td>
            <td>
                <a href="{{url('order_info',$data->id)}}" class="btn btn-primary">Details</a>
                @if($data->status != 3 && $data->status !=4)
                <a onclick="return confirm('Are you sure to cancel this order?')"
                   href="{{url('cancel_order',$data->id)}}" class="btn btn-danger">Cancel</a>
                    @endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>


<!-- Footer Start -->
@include('home.footer')
<!-- Footer End -->


<!-- Back to Top -->
<a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="home/lib/easing/easing.min.js"></script>
<script src="home/lib/owlcarousel/owl.carousel.min.js"></script>

<!-- Contact Javascript File -->
<script src="home/mail/jqBootstrapValidation.min.js"></script>
<script src="home/mail/contact.js"></script>

<!-- Template Javascript -->
<script src="home/js/main.js"></script>
</body>

</html>
