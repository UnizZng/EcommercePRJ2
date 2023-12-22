<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <base href  ="/public">
    <title>Details</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    @include('home.assets')
</head>

<body>

<!-- Topbar Start -->
@include('home.topbar')
@if(session()->has('message'))

    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
        {{session()->get('message')}}
    </div>
@endif
<!-- Topbar End -->
<table class="table" >
    <th></th>
    <th>

    </th>
    <th></th>
    <tr>
        <td rowspan="2">
            <div class='col-md-3 mb-2'>
                <div class='card' style='width: 18rem; '>
                    <div class='card-body'>
                        <img src='/product/{{$product->image}} ' class='card-img-top' alt='$name'>

                        <h5 class='card-title' style="padding-top: 10px">{{$product->name}}</h5>

                        <h5 class='text-center'>
                            ${{$product->price}}
                        </h5>
                        <div class="text-center">
                            <a class=" btn btn-primary mx-2"
                               href="{{ url('add_cart/'.$product->id) }}">Add
                                to
                                Cart</a>
                        </div>
                    </div>
                </div>
            </div>
        </td>
        <td class="bg-secondary text-black" style="vertical-align: top;" rowspan="2">
                <span>
                    <h3 class="text-center">Description</h3> <br>
                    <?php
                    print nl2br( $product->description );
                    ?>

                </span>
        </td>
        <td class="text-center">
            <h3>Specifications</h3>
        </td>
    </tr>
    <tr>

        <td style="vertical-align: top" >
            <table class="table table-bordered">
                <tr>
                    <td>CPU</td>
                    <td>{{$product->cpu}}</td>
                </tr>
                <tr>
                    <td>RAM</td>
                    <td>{{$product->ram}}</td>
                </tr>
                <tr>
                    <td>Storage</td>
                    <td>{{$product->storage}}</td>
                </tr>
                <tr>
                    <td>Screen</td>
                    <td>{{$product->screen}}</td>
                </tr>
                <tr>
                    <td>Operating System</td>
                    <td>{{$product->os}}</td>
                </tr>
                <tr>
                    <td>Ports</td>
                    <td>{{$product->ports}}</td>
                </tr>
                <tr>
                    <td>Battery</td>
                    <td>{{$product->battery}}</td>
                </tr>
            </table>
        </td>
    </tr>



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

