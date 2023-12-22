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

<div class="container">
    <table class='table'>
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
        @if(session('cart'))

            @foreach(session('cart') as $id => $details)
        <tr>
            <td>
                {{ $details['name'] }}
            </td>
            <td class="text-center">
                <div class="float-left">
               @if($details['quantity'] == 1)
                        <a href="{{ url('minus_cart/'.$id) }}" ><button class="btn btn-danger btn-sm" disabled>-</button> </a>
                @else
                        <a href="{{ url('minus_cart/'.$id) }}" ><button class="btn btn-danger btn-sm">-</button> </a>
                @endif
                </div>
               {{$details['quantity']}}

                   <div class="float-right">
                @if($details['quantity'] == $details['total_quantity'])
                           <a href="{{ url('plus_cart/'.$id) }}"><button class="btn btn-danger btn-sm" disabled>+</button></a>
                   @else
                           <a href="{{ url('plus_cart/'.$id) }}"><button class="btn btn-danger btn-sm" >+</button></a>
                    @endif
                </div>



            </td>
            <td>
               ${{$details['price']}}
            </td>
            <td>
                <img src="/product/{{$details['image']}}" class="img-thumbnail" style="width: 100px">
            </td>
            <td>
                <a class="btn btn-danger mx-2"
                   href="{{ url('remove_cart/'.$id) }}">Remove</a>
            </td>
        </tr>
        <tr></tr>
        @php(
        $total += intval($details['price']) * $details['quantity']
    )
            @endforeach

        @endif

        <tr>
            <td>Total Price: ${{$total}}</td>
            <td></td>
            <td></td>
            <td></td>
            <td>
            @if(session('cart'))
            <a href="/place_order" class = "btn btn-success">Place Order</a>
            @endif
            </td>
        </tr>
        </tbody>
    </table>


</div>














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

