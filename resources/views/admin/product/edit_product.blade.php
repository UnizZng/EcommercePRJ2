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
    @include('admin.product.sidebar')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin.product.navbar_product')
        <!-- partial -->
        <div class = "main-panel">
            <div class = "content-wrapper">
                <form action="{{url('/update_product',$data->id)}}" method="POST" class="form-group" enctype="multipart/form-data">
                    @csrf
                    <label for="product_name">Product's Name</label>
                    <input type="text" class="form-control text-dark bg-white" id="product_name" name="product_name"
                           placeholder="Write Product's Name" value ="{{$data->name}}" required>
                    <br>
                    <label for="product_quantity">Quantity</label>
                    <input type="number" class="form-control text-dark bg-white" min="0" id="product_quantity" name="product_quantity"
                           placeholder="Write Quantity" value ="{{$data->quantity}}" required>
                    <br>
                    <label for="product_price">Product's Price</label>
                    <input type="text" class="form-control text-dark bg-white" id="product_price" name="product_price"
                           placeholder="Write Product's Price" value ="{{$data->price}}" required>
                    <br>
                    <label for="product_image">Image</label>
                    <input type="file" class="form-control text-dark bg-white" id="product_image" name="product_image"
                           placeholder="Write Product name">
                    <br>
                    <label for="product_description">Product's Description</label>
                    <textarea type="text" class="form-control text-dark bg-white" id="product_description" name="product_description"
                           placeholder="Write Product's Description" required>{{$data->description}}</textarea>
                    <br>
                    <label for="product_cpu">CPU</label>
                    <input type="text" class="form-control text-dark bg-white" id="product_cpu" name="product_cpu"
                           placeholder="Write Product's CPU" value ="{{$data->cpu}}"required>
                    <br>
                    <label for="product_ram">RAM</label>
                    <input type="text" class="form-control text-dark bg-white" id="product_ram" name="product_ram"
                           placeholder="Write Product's RAM'" value ="{{$data->ram}}"required>
                    <br>
                    <label for="product_storage">Storage</label>
                    <input type="text" class="form-control text-dark bg-white" id="product_storage" name="product_storage"
                           placeholder="Write Product's Storage" value ="{{$data->storage}}"required>
                    <br>
                    <label for="product_gpu">GPU</label>
                    <input type="text" class="form-control text-dark bg-white" id="product_gpu" name="product_gpu"
                           placeholder="Write Product's GPU'" value ="{{$data->gpu}}"required>
                    <br>
                    <label for="product_screen">Screen</label>
                    <input type="text" class="form-control text-dark bg-white" id="product_screen" name="product_screen"
                           placeholder="Write Product's Screen'" value ="{{$data->screen}}"required>
                    <br>
                    <label for="product_os">OS</label>
                    <input type="text" class="form-control text-dark bg-white" id="product_os" name="product_os"
                           placeholder="Write Product's Operating System" value ="{{$data->os}}"required>
                    <br>
                    <label for="product_ports">Ports</label>
                    <input type="text" class="form-control text-dark bg-white" id="product_ports" name="product_ports"
                           placeholder="Write Product's Ports'" value ="{{$data->ports}}"required>
                    <br>
                    <label for="product_battery">Battery</label>
                    <input type="text" class="form-control text-dark bg-white" id="product_battery" name="product_battery"
                           placeholder="Write Product's Battery'" value ="{{$data->battery}}"required>
                    <br>


                    <label for="product_brand">Brand</label>
                    <select name="product_brand" class="form-control text-dark bg-white" id="product_brand">
                        @foreach($brand as $product_brand)
                            @if ($product_brand->id == $data->brand_id)
                            <option value="{{$product_brand->id}}" selected>{{$product_brand->name}}</option>
                                @else
                                <option value="{{$product_brand->id}}" >{{$product_brand->name}}</option>
                            @endif
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
                    <input type="submit" class="btn btn-primary btn-block" value="Update">
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


