@include('admin.includes.sidebar')
<div class="main_container">
   <div class="container">
       <div class="main-body">
        <h3>Add Banner</h3>
               <div class="col-lg-8">
                   <div class="card pt-4 mt-3">
                       <div class="card-body">
                           <form action="{{ route('store.banner') }}" class="" method="POST" enctype="multipart/form-data">
                              @csrf
                              <div class="row">
                                <label for="title">Banner Title</label>
                                 <div class="col-xl-8">
                                    <input type="text" name="banner_title"  placeholder="Add title" class="form-control">
                                 </div>
                              </div>
                              <div class="row">
                                <label for="short title">Banner Url</label>
                                <div class="col-xl-8">
                                   <input type="text" name="banner_url"  placeholder="Add url" class="form-control">
                                </div>
                             </div>
                              <div class="row">
                                <label for="Image">Image</label>
                                 <div class="col-xl-6 mt-2">
                                    <input type="file" name="banner_image">
                                 </div>
                              </div>
                              <div class="row mt-3">
                                 <button type="submit" name="add_banner" class="btn vms-btn">Add Banner</button>
                              </div>
                           </form>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
@include('admin.includes.footer')