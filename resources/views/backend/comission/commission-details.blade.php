@include('admin.includes.sidebar')

<div class="main_container">
    @include('admin.includes.notification')
    <div class="row">
        <div class="col-xl-12 mb-4">
            <div class="card">
                <div class="card-header bg-success text-white">
                    Commission Details in {{ $date }}
                </div>
                @php
                    $sellers = App\Models\User::where('role', 'seller')->get();
                @endphp
                
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Seller Name</th>
                                    <th>Total Amount</th>
                                    <th>Deducted Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sellers as $seller)
                                @php
                                    $existingCommission = App\Models\Commission::where('seller_id', $seller->id)
                                            ->where('date', $date)
                                            ->first();
                                @endphp
                                    <tr>
                                        <td>{{ $seller->name }}</td>
                                        @if ($existingCommission->date == $date)
                                        <td>{{ $existingCommission->total_amount }}</td>
                                        <td>{{ $existingCommission->deducted_amount }}</td>
                                        @else
                                            
                                        @endif
                                        
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="2" class="text-end fw-bold">Total Deducted Amount:</td>
                                    <td>{{ $totalDeductedAmount }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
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