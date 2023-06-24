@include('admin.includes.sidebar')
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <!--end breadcrumb-->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Report By Sellers</h1>
            {{-- <a type="button" href="{{ route('complete.request') }}" class="d-none d-sm-inline-block btn vms-btn btn-sm shadow-sm" >
                Completed Request <i class="fa fa-plus fa-sm"></i>
            </a> --}}
        </div>
        <div class="row row-cols-1 row-cols-md-1 row-cols-lg-3 row-cols-xl-3">
            <form action="{{ route('calculateCommission') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="date">Select Date:</label>
                    <input type="date" name="date" id="date" class="form-control" required>
                </div>
                <button type="submit" class="btn vms-btn">Calculate Commission</button>
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