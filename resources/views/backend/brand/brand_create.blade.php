@include('admin.includes.sidebar')
<div class="main_container">
   <div class="container">
       <div class="main-body">
               <div class="col-lg-8">
                   <div class="card">
                       <div class="card-body">
                           <form action="{{ route('store.brand') }}" class="" method="POST" enctype="multipart/form-data">
                              @csrf
                              <div class="row">
                                 <div class="col-xl-6 ">
                                    <input type="text" name="brand_name"  placeholder="Brand name" class="form-control">
                                 </div>
                                 <div class="col-xl-6 mt-2">
                                    <input type="file" name="brand_image">
                                 </div>
                              </div>
                              <div class="row">
                                 <button type="submit" name="add_brand" class="btn vms-btn">create</button>
                              </div>
                           </form>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
@include('admin.includes.footer')