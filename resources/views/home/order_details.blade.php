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

<h1 class="text-center" style="font-size: 50px">Order Details</h1>
<table class='table text-center' >
    <thead>
    <tr>

        <th scope='col'>Name</th>
        <th scope='col'>Quantity</th>
        <th scope='col'>Price</th>
        <th scope='col'>Image</th>
        <th scope='col'></th>
        <th scope='col'></th>
        <th scope='col'></th>


    </tr>
    </thead>
    <tbody>
    @php($total = 0)
    @foreach($details as $detail)
        @php($product = App\Models\Product::find($detail->product_id))
        <tr>
            <td>
                {{ $product['name'] }}
            </td>
            <td class="text-center">
                {{$detail['quantity']}}
            </td>
            <td>
                ${{$detail['price']}}
            </td>
            <td>
                <img src="/product/{{$product['image']}}" class="img-fluid" style="width: 100px; height: 100px">
            </td>
        </tr>
        @php(
        $total += intval($detail['price']) * $detail['quantity']
    )
    @endforeach

    <tr >
        <td style="font-size: 20px">
            Order ID: {{$orders->id}}
            <br>
            Customer's Name: {{$customers->name}}
            <br>
            Phone Number: {{$customers->phone}}
            <br>
            Address: {{$customers->address}}
        </td>
        <td style="font-size: 20px"><div>Total Cost: <span class="text-success">${{$total}}</span></div></td>

        <td>

                <label for="order_status" style="font-size: 20px ">Status: </label>
                    @if($orders->status == 0)
                        <div class="text-warning">Pending</div>
                    @elseif($orders->status == 1)
                        <div class="text-primary">Authorized</div>
                    @elseif($orders->status == 2)
                        <div class="text-info">Shipping</div>
                    @elseif($orders->status == 3)
                        <div class="text-success" >Shipped</div>
                    @elseif($orders->status == 4)
                        <div class="text-danger">Canceled</div>
                    @endif

                </select>



        </td>
        <td>
            @if($orders->status != 3 && $orders->status !=4)
                <a onclick="return confirm('Are you sure to cancel this order?')"
                   href="{{url('cancel_order',$orders->id)}}" class="btn btn-danger">Cancel</a>
                @endif
        </td>

    </tr>
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



