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
    @include('admin.order.sidebar')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin.order.navbar')
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
                    <h1 class="text-center" style="font-size: 50px">Order Details</h1>
                <table class='table' >
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
                        @foreach($details as $detail)
                            @php($product = App\Models\Product::find($detail->product_id))
                            <tr>
                                <td>
                                    {{ $product['name'] }}
                                </td>
                                <td class="text-center">
                                    {{$detail['quantity']}}
                                </td>
                                <td>
                                    ${{$detail['price']}}
                                </td>
                                <td>
                                    <img src="/product/{{$product['image']}}" class="img-fluid" style="width: 100px; height: 100px">
                                </td>
                            </tr>
                            @php(
                            $total += intval($detail['price']) * $detail['quantity']
                        )
                        @endforeach

                        <tr >
                            <td style="font-size: 20px">
                                Order ID: {{$orders->id}}
                                <br>
                                Customer's ID: {{$customers->id}}
                                <br>
                                Phone Number: {{$customers->phone}}
                                <br>
                                Address: {{$customers->address}}
                            </td>
                            <td style="font-size: 20px"><div>Total Cost: <span class="text-danger">${{$total}}</span></div></td>

                            <td>
                                <form action="{{url('/update_order',$orders->id)}}" method="POST" class="form-group" enctype="multipart/form-data">
                                    @csrf
                                <label for="order_status" style="font-size: 20px ">Status: </label>
                                <select name="order_status" class="form-control text-dark bg-white" id="order_status">
                                    @if($orders->status == 0)
                                        <option value="0" selected>Pending</option>
                                        <option value="1" >Authorized</option>
                                        <option value="2" >Shipping</option>
                                        <option value="3" >Shipped</option>
                                        <option value="4" >Canceled</option>
                                    @elseif($orders->status == 1)
                                        <option value="0" >Pending</option>
                                        <option value="1" selected>Authorized</option>
                                        <option value="2" >Shipping</option>
                                        <option value="3" >Shipped</option>
                                        <option value="4" >Canceled</option>
                                    @elseif($orders->status == 2)
                                        <option value="0" >Pending</option>
                                        <option value="1" >Authorized</option>
                                        <option value="2" selected>Shipping</option>
                                        <option value="3" >Shipped</option>
                                        <option value="4" >Canceled</option>
                                    @elseif($orders->status == 3)
                                        <option value="0" >Pending</option>
                                        <option value="1" >Authorized</option>
                                        <option value="2" >Shipping</option>
                                        <option value="3" selected>Shipped</option>
                                        <option value="4" >Canceled</option>
                                    @elseif($orders->status == 4)
                                        <option value="0" >Pending</option>
                                        <option value="1" >Authorized</option>
                                        <option value="2" >Shipping</option>
                                        <option value="3" >Shipped</option>
                                        <option value="4" selected>Canceled</option>
                                @endif

                                </select>
                                    <br>
                                    <input type="submit" class="btn btn-primary btn-block " value="Update Status">
                             </form>
                            </td>
                            <td><a onclick="return confirm('Are you sure to delete this order?') "
                                   href="{{url('delete_order',$orders->id)}}" class="btn btn-danger btn-block ">Delete Order</a></td>

                        </tr>
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



