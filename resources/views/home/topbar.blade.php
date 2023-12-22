<div class="container-fluid">
    <div class="row bg-secondary py-2 px-xl-5">
        <div class="col-lg-6 d-none d-lg-block">
            <div class="d-inline-flex align-items-center">
                <a class="text-dark" href="">FAQs</a>
                <span class="text-muted px-2">|</span>
                <a class="text-dark" href="">Help</a>
                <span class="text-muted px-2">|</span>
                <a class="text-dark" href="">Support</a>
            </div>
        </div>
        <div class="col-lg-6 text-center text-lg-right">
            <div class="d-inline-flex align-items-center">
                <a class="text-dark px-2" href="/redirect">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a class="text-dark px-2" href="/redirect">
                    <i class="fab fa-twitter"></i>
                </a>
                <a class="text-dark px-2" href="/redirect">
                    <i class="fab fa-linkedin-in"></i>
                </a>
                <a class="text-dark px-2" href="/redirect">
                    <i class="fab fa-instagram"></i>
                </a>
                <a class="text-dark pl-2" href="/redirect">
                    <i class="fab fa-youtube"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="row align-items-center py-3 px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
            <a href="/index_home" class="text-decoration-none">
                <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">UnizZng's</span>Store</h1>
            </a>
        </div>
        <div class="col-lg-4 col-6 text-left">
            <form action= "{{url('search')}}" method="GET">
                @csrf
                <div class="input-group">
                    <input type="text" class="form-control" name="user_search_data" placeholder="Search for products">
                    <div class="input-group-append">
                            <span class="input-group-text bg-transparent text-primary">
                                 <a type="Submit" class="fa fa-search"></a>
                            </span>
                    </div>
                </div>
            </form>
        </div>
        @if (Route::has('login'))
            @auth
                <div class="col-lg-1 col-6 text-right">

                    <a href="/cart" class="btn border">
                        <i class="fas fa-shopping-cart text-primary"></i>
                        <span class="badge">Cart</span>
                    </a>
                </div>
                <div class="col-lg-1 col-6 text-right">
                    <a class="nav-item nav-link active" href="{{ url('/user_order') }}">Orders</a>
                </div>
                <div class="col-lg-2 col-6 text-right">
                    <a class="nav-item nav-link active" href="/user/profile">Hello: {{ Auth::user()->name }} </a>
                </div>
                <div class="col-lg-1 col-6 text-right">
                    <a href="{{ url('/logout') }}" class="nav-item nav-link"><span class="badge">Logout</span>  </a>
                </div>
            @else
                <div class="col-lg-2 col-6 text-right">

                    <a href="{{ route('login') }}" class="nav-item nav-link">Login</a>

                </div>

                @if (Route::has('register'))
                    <div class="col-lg-1 col-6 text-right">

                        <a href="{{ route('register') }}" class="nav-item nav-link">Register</a>

                    </div>

                @endif
            @endauth

        @endif
    </div>
</div>
