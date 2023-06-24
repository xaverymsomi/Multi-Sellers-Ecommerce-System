@include('admin.includes.sidebar')
<div class="main_container">
   <div class="container">
       <div class="main-body">
               <div class="col-lg-8">
                   <div class="card pt-4 mt-3">
                    <div class="card-header">
                        <h4>Add Region</h4>
                    </div>
                       <div class="card-body">
                           <form action="{{ route('store.region') }}" class="" method="POST" enctype="multipart/form-data">
                              @csrf
                              <div class="row">
                                <div class="col-xl-6 ">
                                <label for="Region Name">Region Name</label>
                                   <input type="text" name="division_name" class="form-control">
                                </div>
                             </div>
                              <div class="row mt-3">
                                 <button type="submit" name="ire" class="btn vms-btn">Add region</button>
                              </div>
                           </form>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
@include('admin.includes.footer')