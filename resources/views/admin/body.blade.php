<div class="main-panel">
    <div class="content-wrapper">

        <div class="row">
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="text-success mb-0">${{$total_revenue}}</h3>
                                </div>
                            </div>
                        </div>
                        <br>
                        <h6 class="text-muted font-weight-normal">Total Revenue</h6>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="text-success mb-0">${{$monthly_revenue}}</h3>
                                </div>
                            </div>
                        </div>
                        <br>
                        <h6 class="text-muted font-weight-normal">This Month Revenue</h6>
                    </div>
                </div>
            </div>
{{--            Total User--}}
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0">{{$total_customers}}</h3>
                                </div>
                            </div>
                        </div>
                        <br>
                        <h6 class="text-muted font-weight-normal">Total Customer Accounts</h6>
                    </div>
                </div>
            </div>
{{--            Total Products--}}
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0">{{$total_product}}</h3>
                                </div>
                            </div>
                        </div>
                        <br>
                        <h6 class="text-muted font-weight-normal">Total Product Count</h6>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="text-danger mb-0">{{$total_pending_orders}}</h3>
                                </div>
                            </div>
                        </div>
                        <br>
                        <h6 class="text-muted font-weight-normal">Pending Order(s)</h6>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="text-success mb-0">{{$total_delivered_orders}}</h3>
                                </div>
                            </div>
                        </div>
                        <br>
                        <h6 class="text-muted font-weight-normal">Delivered Order(s)</h6>
                    </div>
                </div>
            </div>
        </div>





    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->

    <!-- partial -->
</div>

