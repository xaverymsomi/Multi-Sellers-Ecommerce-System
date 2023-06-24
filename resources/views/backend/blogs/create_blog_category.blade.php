@include('admin.includes.sidebar')
<div class="main_container">
   <div class="container">
       <div class="main-body">
               <div class="col-lg-8">
                   <div class="card pt-4 mt-3">
                       <div class="card-body">
                           <form action="{{ route('store.blog_category') }}" class="" method="POST" enctype="multipart/form-data">
                              @csrf
                              <div class="row">
                                 <div class="col-xl-8">
                                    <input type="text" name="blog_category_name"  placeholder="Blog Category name" class="form-control">
                                 </div>
                              </div>
                              <div class="row mt-3">
                                 <button type="submit" name="add_blog_category" class="btn vms-btn">Add Blog Category</button>
                              </div>
                           </form>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
@include('admin.includes.footer')