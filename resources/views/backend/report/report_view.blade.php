@include('admin.includes.sidebar')
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <!--end breadcrumb-->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Report</h1>
            {{-- <a type="button" href="{{ route('complete.request') }}" class="d-none d-sm-inline-block btn vms-btn btn-sm shadow-sm" >
                Completed Request <i class="fa fa-plus fa-sm"></i>
            </a> --}}
        </div>
        <div class="row row-cols-1 row-cols-md-1 row-cols-lg-3 row-cols-xl-3">
            <form action="{{ route('admin.search_by_date') }}" method="post">
                @csrf
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Search By Date</h5>
                            <label for="Date" class="form-label">Date:</label>
                            <input type="date" name="order_date" class="form-control">
                            <input type="submit" class="btn btn-rounded vms-btn" value="search">
                        </div>
                    </div>
                </div>
            </form>
            <form action="{{ route('admin.search_by_month') }}" method="post">
                @csrf
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Search By Month</h5>
                            <label for="Date" class="form-label">Select Month:</label>
                            <select class="form-control mb-3" name="order_month" aria-label="Default select example">
                                <option selected="">Open this select month</option>
                                <option value="January">January</option>
                                <option value="February">February</option>
                                <option value="March">March</option>
                                <option value="April">April</option>
                                <option value="May">May</option>
                                <option value="June">June</option>
                                <option value="July">July</option>
                                <option value="August">August</option>
                                <option value="September">September</option>
                                <option value="October">October</option>
                                <option value="November">November</option>
                                <option value="December">December</option>
                            </select>
                            <label for="Date" class="form-label">Select Year:</label>
                            <select class="form-control mb-3" name="order_year" aria-label="Default select example">
                                <option selected="">Open this select year</option>
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                            </select>
                            <input type="submit" class="btn btn-rounded vms-btn" value="search">
                        </div>
                    </div>
                </div>
            </form>
            <form action="{{ route('admin.search_by_year') }}" method="post">
                @csrf
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Search By Year</h5>
                            <label for="Date" class="form-label">Select Year:</label>
                            <select class="form-control mb-3" name="order_year" aria-label="Default select example">
                                <option selected="">Open this select year</option>
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                            </select>
                            <input type="submit" class="btn btn-rounded vms-btn" value="search">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@include('admin.includes.footer')
<script type="text/javascript">
    $(document).ready(function() {
        $('.count').each(function () {
            $(this).prop('Counter',0).animate({
                Counter: $(this).text()
                }, {
                    duration: 1000,
                    easing: 'swing',
                        step: function (now) {
                            $(this).text(Math.ceil(now));
                        }
                });
            });
    })
</script>