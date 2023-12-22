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
    @include('admin.user.sidebar')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin.user.navbar')
        <!-- partial -->
        <div class = "main-panel">
            <div class = "content-wrapper">
                {{--Add Alert--}}
                @if(session()->has('message'))

                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        {{session()->get('message')}}
                    </div>
                @endif
                {{--End Add Alert--}}

                <h3 class="display-3" style="text-align:center">User's ID: {{$data->id}}</h3>
                <form action="{{url('/update_user',$data->id)}}" method="POST" class="form-group">
                    @csrf
                    <label for="user_name">Full Name</label>
                    <input type="text" class="form-control text-dark" id="user_name" name="user_name"
                           value="{{$data->name}}" disabled>
                    <br>
                    <label for="user_email">Email Address</label>
                    <input type="text" class="form-control text-dark" id="user_email" name="user_email"
                           value="{{$data->email}}" disabled>
                    <br>

                    <label for="user_phone">Phone</label>
                    <input type="text" class="form-control text-dark" id="user_phone" name="user_phone"
                           value="{{$data->phone}}" disabled>
                    <br>
                    <label for="user_address">Address</label>
                    <input type="text" class="form-control text-dark" id="user_address" name="user_address"
                           value="{{$data->address}}" disabled>
                    <br>

                    <label for="user_type">User Type</label>
                    <select name="user_type" class="form-control text-dark bg-white" id="product_brand">
                            @if ($data->usertype == 0)
                                <option value="0" selected>Customer</option>
                                <option value="1">Admin</option>
                            @else
                            <option value="0">Customer</option>
                            <option value="1"selected>Admin</option>
                            @endif
                    </select>
                    <br>

                    <input type="submit" class="btn btn-primary btn-block" value="Update User Type">
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



