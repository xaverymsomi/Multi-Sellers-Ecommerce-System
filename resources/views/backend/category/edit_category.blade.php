@include('admin.includes.sidebar')
<div class="main_container">
   <div class="container">
       <div class="main-body">
         <h3>Edit Category</h3>
               <div class="col-lg-8">
                   <div class="card">
                       <div class="card-body">
                           <form action="{{ route('update.category') }}" class="" method="POST" enctype="multipart/form-data">
                              @csrf
                              <input type="hidden" name="id" value="{{ $category->id }}">
                              <input type="hidden" name="image" value="{{ $category->category_image }}">
                              <div class="row pt-3">
                                 <div class="col-xl-6 ">
                                    <input type="text" name="category_name"  value="{{ $category->category_name }}" class="form-control">
                                 </div>
                                 <div class="col-xl-6 mt-2">
                                    <input type="file" name="category_image">
                                 </div>
                              </div>
                              <div class="row">
                                 <button type="submit" name="add_category" class="btn vms-btn">Edit Category</button>
                              </div>
                           </form>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
@include('admin.includes.footer')