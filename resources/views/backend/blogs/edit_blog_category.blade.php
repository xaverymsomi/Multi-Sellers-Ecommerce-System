@include('admin.includes.sidebar')
<div class="main_container">
   <div class="container">
       <div class="main-body">
         <h3>Edit Blog Category</h3>
               <div class="col-lg-8">
                   <div class="card">
                       <div class="card-body">
                           <form action="{{ route('update.blog_category') }}" class="" method="POST" enctype="multipart/form-data">
                              @csrf
                              <input type="hidden" name="id" value="{{ $blogcategory->id }}">
                              <div class="row pt-3">
                                 <div class="col-xl-6 ">
                                    <input type="text" name="blog_category_name"  value="{{ $blogcategory->blog_category_name }}" class="form-control">
                                 </div>
                              </div>
                              <div class="row">
                                 <button type="submit" name="blog_category" class="btn vms-btn">Edit Blog Category</button>
                              </div>
                           </form>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
@include('admin.includes.footer')