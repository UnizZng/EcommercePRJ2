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

<!-- Navbar Start -->
@include('home.navbar')
<!-- Navbar End -->


<!-- Featured Start -->
@include('home.featured')
<!-- Featured End -->





<!-- Offer Start -->
@include('home.offer')
<!-- Offer End -->


<!-- Products Start -->
@include('home.products')
<!-- Products End -->


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
