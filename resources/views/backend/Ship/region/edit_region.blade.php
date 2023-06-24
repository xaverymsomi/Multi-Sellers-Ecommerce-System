@include('admin.includes.sidebar')
<div class="main_container">
   <div class="container">
       <div class="main-body">
               <div class="col-lg-8">
                   <div class="card">
                    <div class="card-header">
                        <h4> Edit Region </h4>
                    </div>
                       <div class="card-body">
                           <form action="{{ route('update.region') }}" class="" method="POST" enctype="multipart/form-data">
                              @csrf
                              <input type="hidden" name="id" id="" value="{{ $division->id }}">
                              <div class="row pt-3">
                                 <div class="col-xl-6 ">
                                    <input type="text" name="division_name"  value="{{ $division->division_name }}" class="form-control">
                                 </div>
                                </div>
                              <div class="row">
                                 <button type="submit" name="add_region" class="btn vms-btn">Edit Region</button>
                              </div>
                           </form>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
@include('admin.includes.footer')