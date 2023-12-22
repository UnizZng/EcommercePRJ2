<x-app-layout></x-app-layout>
<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.header')
</head>
<body>
<div class="container-scroller">
    <!-- partial:partials/_sidebar.html -->
    @include('admin.product.sidebar')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin.product.navbar_product')
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
                <h1 class="display-1" style="text-align:center">Products</h1>
                <br>
                <table class="table table-dark">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                        <th scope="col">Image</th>
                        <th scope="col">Brand</th>
                        <th scope="col">Category</th>



                    </tr>
                    </thead>
                    <tbody>
                    @foreach($product as $data)

                        <tr>
                            <th scope="row">{{$data->id}}</th>
                            <td>{{$data->name}}</td>
                            <td>{{$data->quantity}}</td>
                            <td>${{$data->price}}</td>
                            <td><img src="/product/{{$data->image}}" class="rounded d-block"></td>

                            <td>
                                {{App\Models\Brand::find($data->brand_id)->name}}
                            </td>

                            <td>{{App\Models\Category::find($data->category_id)->name}}</td>
                            <td>
                                <a href="{{url('edit_product',$data->id)}}" class="btn btn-primary">Edit</a>
                                <a onclick="return confirm('Are you sure to delete this item?')"
                                   href="{{url('delete_product',$data->id)}}" class="btn btn-danger">Delete</a>

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


