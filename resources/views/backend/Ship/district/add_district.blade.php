@include('admin.includes.sidebar')
<div class="main_container">
   <div class="container">
       <div class="main-body">
               <div class="col-lg-8">
                   <div class="card pt-4 mt-3">
                    <div class="card-header">
                        <h4>Add District</h4>
                    </div>
                       <div class="card-body">
                        <form action="{{ route('store.district') }}" class="" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                               <div class="col-xl-6 ">
                                  <select name="division_id" id="" class="form-control mb-3" aria-label="Default select example">
                                      <option selected="">Select One Region</option>
                                      @foreach ($ship_division as $items)
                                      <option value="{{ $items->id }}">{{ $items->division_name }}</option>
                                      @endforeach
                                      
                                  </select>
                               </div>
                            </div>
                            <div class="row">
                              <div class="col-xl-6 ">
                                <label for="District Name">District Name</label>
                                 <input type="text" name="district_name" class="form-control">
                              </div>
                           </div>
                            <div class="row mt-3">
                               <button type="submit" name="add" class="btn vms-btn">Add District</button>
                            </div>
                         </form>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
@include('admin.includes.footer')