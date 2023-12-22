<div class="container-fluid mb-5">
    <div class="row border-top px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
            <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                <h6 class="m-0">Categories</h6>
                <i class="fa fa-angle-down text-dark"></i>
            </a>
            <nav class="collapse show navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0" id="navbar-vertical">
                <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
                    @php($categories =\App\Models\Category::all())
                    @foreach($categories as $category)
                        <a href="{{url('sort_category',$category->id)}}" class="nav-item nav-link">{{$category->name}}</a>
                    @endforeach

                </div>
            </nav>
        </div>
        <div class="col-lg-6 d-none d-lg-block text-right">

               <img class="figure-img img-fluid" src="img/gaming-laptop-search-pic.png" alt="Image">
                    <h1 class= "text-lg text-dark"style=" background-color: white;position: absolute; top: 50%;left: 50%; transform: translate(-50%, -50%);">-Search Results-</h1>

        </div>
        <div class="col-lg-3 d-none d-lg-block text-right">
            <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                <i class="fa fa-angle-down text-dark"></i>
                <h6 class="m-0 text-right">Brands</h6>

            </a>
            <nav class="collapse show navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0" id="navbar-vertical">
                <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
                    @php($brands =\App\Models\Brand::all())
                    @foreach($brands as $brand)
                        <a href="{{url('sort_brand',$brand->id)}}" class="nav-item nav-link">{{$brand->name}}</a>
                    @endforeach

                </div>
            </nav>
        </div>

    </div>
</div>

