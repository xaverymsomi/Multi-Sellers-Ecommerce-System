@include('admin.includes.sidebar')
<div class="main_container">
   <div class="container">
       <div class="main-body">
               <div class="col-lg-8">
                   <div class="card">
                       <div class="card-body">
                           <form action="{{ route('update.district') }}" class="" method="POST" enctype="multipart/form-data">
                              @csrf
                              <input type="hidden" name="id" id="" value="{{ $district->id }}">
                              <div class="row pt-3">
                                 <div class="col-xl-6 ">
                                    <select name="division_id" id="" class="form-control mb-3" aria-label="Default select example">
                                        <option selected="">Select One Region</option>
                                        @foreach ($region as $items)
                                        <option value="{{ $items->id }}" {{ $items->id == $district->division_id ? 'selected' : '' }}>{{ $items->division_name }}</option>
                                        @endforeach
                                        
                                    </select>
                                 </div>
                                 <div class="col-xl-6 mt-2">
                                    <input type="text" name="district_name"  value="{{ $district->district_name }}" class="form-control">
                                 </div>
                              </div>
                              <div class="row">
                                 <button type="submit" name="adc" class="btn vms-btn">Edit District</button>
                              </div>
                           </form>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
@include('admin.includes.footer')