<x-app-layout></x-app-layout>
<!DOCTYPE html>
<html lang="en">
<head>
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
    @include('admin.category.sidebar')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin.category.navbar_category')
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
                    <h1 class="h1_font">Add Category</h1>
                </div>
                <form action="{{url('/save_category')}}" method="POST" class="form-group">
                    @csrf
                    <label for="category_name">Category Name</label>
                    <input type="text" class="form-control text-dark" id="category_name" name="category_name"
                           placeholder="Write category name"required>
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

