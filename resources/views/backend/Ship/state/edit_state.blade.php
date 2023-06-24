@include('admin.includes.sidebar')
<div class="main_container">
   <div class="container">
       <div class="main-body">
               <div class="col-lg-8">
                   <div class="card pt-4 mt-3">
                    <div class="card-header">
                        <h4>Edit State</h4>
                    </div>
                       <div class="card-body">
                        <form action="{{ route('update.state') }}" class="" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" id="" value="{{ $state->id }}">
                            <div class="row">
                               <div class="col-xl-8">
                                <label for="District Name">Region Name</label>
                                  <select name="division_id" id="" class="form-control mb-3" aria-label="Default select example">
                                    <option></option>
                                    @foreach ($region as $item)
                                    <option value="{{ $item->id }}" {{ $item->id == $state->division_id ? 'selected' : '' }}>{{ $item->division_name }}</option>
                                    @endforeach
                                      
                                  </select>
                               </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-8">
                                    <label for="District Name">District Name</label>
                                    <select  name="district_id" class="form-control" id="inputCollection">
                                        <option></option>
                                        @foreach ($district as $districts)
                                        <option value="{{ $districts->id }}" {{ $districts->id == $state->district_id ? 'selected' : '' }}>{{ $districts->district_name }}</option>
                                        @endforeach
                                      </select>
                                      </select>
                                </div>
                             </div>
                            <div class="row">
                              <div class="col-xl-8">
                                <label for="District Name">State Name</label>
                                 <input type="text" name="state_name" class="form-control" value="{{ $state->state_name }}">
                              </div>
                           </div>
                            <div class="row mt-3">
                               <button type="submit" name="add" class="btn vms-btn">Edit State</button>
                            </div>
                         </form>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" 
integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script type="text/javascript">

$(document).ready(function(){
  $('select[name="division_id"]').on('change', function(){
    var division_id = $(this).val();
    if (division_id) {
      $.ajax({
        url: "{{ url('/district/ajax') }}/" + division_id,
        type: "GET",
        dataType: "json",
        success: function(data){
          $('select[name="district_id"]').html('');
          var d = $('select[name="district_id"]').empty();
          $.each(data, function(key, value) {
            $('select[name="district_id"]').append('<option value="' + value.id + '">' + value.district_name + '</option>');
          });
        },
      });
    } else {
      alert('danger');
    }
  });
});

</script>
@include('admin.includes.footer')