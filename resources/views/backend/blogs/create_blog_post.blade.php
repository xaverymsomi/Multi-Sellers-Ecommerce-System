@include('admin.includes.sidebar')
<div class="main_container">
   <div class="container">
       <div class="main-body">
               <div class="col-lg-8">
                   <div class="card pt-4 mt-3">
                       <div class="card-body">
                           <form action="{{ route('store.blog_post') }}" class="" method="POST" enctype="multipart/form-data">
                              @csrf
                              <div class="col-xl-6 ">
                                <select name="blog_category_id" id="" class="form-control mb-3" aria-label="Default select example">
                                    <option selected="">Select One Blog Category</option>
                                    @foreach ($blog_category as $item)
                                    <option value="{{ $item->id }}">{{ $item->blog_category_name }}</option>
                                    @endforeach
                                    
                                </select>
                             </div>
                              <div class="row">
                                 <div class="col-xl-8">
                                    <input type="text" name="post_title"  placeholder="Category name" class="form-control">
                                 </div>
                              </div>
                              <div class="row">
                                <div class="col-xl-8">
                                  <textarea name="post_short_description" id="" placeholder="Short Description" class="form-control"></textarea>
                                </div>
                             </div>
                             <div class="row">
                                <div class="col-xl-8">
                                   <textarea name="post_long_description" id="" placeholder="Long Description" class="form-control"></textarea>
                                </div>
                             </div>
                              <div class="row">
                                 <div class="col-xl-8 mt-2">
                                    <input type="file" name="post_image">
                                 </div>
                              </div>
                              <div class="row mt-3">
                                 <button type="submit" name="add_category" class="btn vms-btn">Add blog post</button>
                              </div>
                           </form>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
@include('admin.includes.footer')