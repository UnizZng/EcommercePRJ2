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
                <h1 class="display-1" style="text-align:center">Users</h1>
                <br>
                <table class="table table-dark">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">User Type</th>
                        <th scope="col">Action</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($user as $data)

                        <tr>
                            <th scope="row">{{$data->id}}</th>
                            <td>{{$data->name}}</td>
                            <td>{{$data->email}}</td>
                             @if($data->usertype == 0)
                                <td>Customer</td>
                                 @else
                                <td>Admin</td>
                             @endif
                            <td>
                                <a href="{{url('detail_user',$data->id)}}" class="btn btn-primary">Details</a>
                                <a onclick="return confirm('Are you sure to delete this item?')"
                                   href="{{url('delete_user',$data->id)}}" class="btn btn-danger">Delete</a>

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


