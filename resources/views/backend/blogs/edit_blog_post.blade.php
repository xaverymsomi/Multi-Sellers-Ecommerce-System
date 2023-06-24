@include('admin.includes.sidebar')
<div class="main_container">
   <div class="container">
       <div class="main-body">
               <div class="col-lg-12">
                   <div class="card">
                       <div class="card-body">
                           <form action="{{ route('update.blog_post') }}" class="" method="POST" enctype="multipart/form-data">
                              @csrf
                              <input type="hidden" name="id" id="" value="{{ $blog_post->id }}">
                              <input type="hidden" name="image" id="" value="{{ $blog_post->post_image }}">
                              <div class="row">
                                 <div class="col-xl-9 ">
                                    <select name="blog_category_id" id="" class="form-control mb-3" aria-label="Default select example">
                                        <option selected="">Select One Blog Category</option>
                                        @foreach ($blog_category as $blog_categories)
                                        <option value="{{ $blog_categories->id }}" {{ $blog_categories->id == $blog_post->blog_category_id ? 'selected' : '' }}>{{ $blog_categories->blog_category_name }}</option>
                                        @endforeach
                                        
                                    </select>
                                 </div>
                                </div>
                                <div class="row"></div>
                                 <div class="col-xl-9 mt-2">
                                    <input type="text" name="post_title"  value="{{ $blog_post->post_title }}" class="form-control">
                                 </div>
                                 <div class="row">
                                 <div class="col-xl-9 mt-2">
                                    <textarea name="post_short_description" class="form-control" id="">{{ $blog_post->post_short_description }}</textarea>
                                 </div>
                                </div>
                                 <div class="row">
                                 <div class="col-xl-9 mt-2">
                                    <textarea name="post_long_description" class="form-control" id="">{{ $blog_post->post_long_description }}</textarea>
                                 </div>
                                </div>
                                 <div class="row">
                                 <div class="col-xl-9 mt-2">
                                    <input type="file" name="post_image">
                                 </div>
                                </div><br>
                              <div class="row">
                                 <button type="submit" name="add_category" class="btn vms-btn">Edit Blog post</button>
                              </div>
                           </form>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
@include('admin.includes.footer')