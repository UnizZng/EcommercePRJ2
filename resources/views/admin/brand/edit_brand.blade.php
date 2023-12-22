<x-app-layout></x-app-layout>
<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/public">
    @include('admin.header')
    <style>
        .div_center {
            text-align: center;
        }

        .h1_font {
            font-size: 40px;
        }
    </style>
</head>
<body>
<div class="container-scroller">
    <!-- partial:partials/_sidebar.html -->
    @include('admin.brand.sidebar')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin.brand.navbar_brand')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                {{--Add Alert--}}
                @if(session()->has('message'))

                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        {{session()->get('message')}}
                    </div>
                @endif
                {{--End Add Alert--}}

                <div class="div_center">
                    <h1 class="h1_font">Edit Brand</h1>
                </div>
                <form action="{{url('/update_brand',$data->id)}}" method="POST" class="form-group">
                    @csrf
                    <label for="brand_name">Brand Name</label>
                    <input type="text" class="form-control text-dark" id="brand_name" name="brand_name"
                           value="{{$data->name}}"required>
                    <br>
                    <input type="submit" class="btn btn-primary btn-block" value="Save">
                </form>
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

