@include('admin.includes.sidebar')
<div class="main_container">
   <div class="container">
       <div class="main-body">
               <div class="col-lg-8">
                   <div class="card pt-4 mt-3">
                       <div class="card-body">
                           <form action="{{ route('store.category') }}" class="" method="POST" enctype="multipart/form-data">
                              @csrf
                              <div class="row">
                                 <div class="col-xl-6 ">
                                    <input type="text" name="category_name"  placeholder="Category name" class="form-control">
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-xl-6 mt-2">
                                    <input type="file" name="category_image">
                                 </div>
                              </div>
                              <div class="row mt-3">
                                 <button type="submit" name="add_category" class="btn vms-btn">Add Category</button>
                              </div>
                           </form>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
@include('admin.includes.footer')