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
    @include('admin.product.sidebar')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin.product.navbar_product')
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
                    <h1 class="h1_font">Add Product</h1>
                </div>
                <form action="{{url('/save_product')}}" method="POST" class="form-group" enctype="multipart/form-data">
                    @csrf
                    <label for="product_name">Product's Name</label>
                    <input type="text" class="form-control text-dark bg-white" id="product_name" name="product_name"
                           placeholder="Write Product's Name" required>
                    <br>
                    <label for="product_quantity">Quantity</label>
                    <input type="number" class="form-control text-dark bg-white" min="0" id="product_quantity" name="product_quantity"
                           placeholder="Write Quantity" required>
                    <br>
                    <label for="product_price">Product's Price</label>
                    <input type="text" class="form-control text-dark bg-white" id="product_price" name="product_price"
                           placeholder="Write Product's Price" required>
                    <br>
                    <label for="product_image">Image</label>
                    <input type="file" class="form-control text-dark bg-white" id="product_image" name="product_image"
                           placeholder="Write Product name"required>
                    <br>
                    <label for="product_description">Product's Description</label>
                    <textarea type="text" class="form-control text-dark bg-white" id="product_description" name="product_description"
                           placeholder="Write Product's Description"required></textarea>
                    <br>
                    <label for="product_cpu">CPU</label>
                    <input type="text" class="form-control text-dark bg-white" id="product_cpu" name="product_cpu"
                           placeholder="Write Product's CPU"required>
                    <br>
                    <label for="product_ram">RAM</label>
                    <input type="text" class="form-control text-dark bg-white" id="product_ram" name="product_ram"
                           placeholder="Write Product's RAM'"required>
                    <br>
                    <label for="product_storage">Storage</label>
                    <input type="text" class="form-control text-dark bg-white" id="product_storage" name="product_storage"
                           placeholder="Write Product's Storage"required>
                    <br>
                    <label for="product_gpu">GPU</label>
                    <input type="text" class="form-control text-dark bg-white" id="product_gpu" name="product_gpu"
                           placeholder="Write Product's GPU'"required>
                    <br>
                    <label for="product_screen">Screen</label>
                    <input type="text" class="form-control text-dark bg-white" id="product_screen" name="product_screen"
                           placeholder="Write Product's Screen'"required>
                    <br>
                    <label for="product_os">OS</label>
                    <input type="text" class="form-control text-dark bg-white" id="product_os" name="product_os"
                           placeholder="Write Product's Operating System"required>
                    <br>
                    <label for="product_ports">Ports</label>
                    <input type="text" class="form-control text-dark bg-white" id="product_ports" name="product_ports"
                           placeholder="Write Product's Ports'"required>
                    <br>
                    <label for="product_battery">Battery</label>
                    <input type="text" class="form-control text-dark bg-white" id="product_battery" name="product_battery"
                           placeholder="Write Product's Battery"required>
                    <br>


                    <label for="product_brand">Brand</label>
                    <select name="product_brand" class="form-control text-dark bg-white" id="product_brand">
                        @foreach($brand as $product_brand)
                            <option value="{{$product_brand->id}}">{{$product_brand->name}}</option>
                        @endforeach
                    </select>
                    <br>

                    <label for="product_category">Category</label>
                    <select name="product_category" class="form-control text-dark bg-white" id="product_category">
                        @foreach($category as $product_category)
                            <option value="{{$product_category->id}}">{{$product_category->name}}</option>
                        @endforeach
                    </select>












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

