@include('admin.includes.sidebar')
<div class="main_container">
   <div class="container">
       <div class="main-body">
        <h3>Edit Banner</h3>
               <div class="col-lg-8">
                   <div class="card">
                       <div class="card-body">
                           <form action="{{ route('update.banner') }}" class="" method="POST" enctype="multipart/form-data">
                              @csrf
                              <input type="hidden" name="id" value="{{ $banner->id }}">
                              <input type="hidden" name="image" value="{{ $banner->banner_image }}">
                              <div class="row pt-3">
                                 <div class="col-xl-6 ">
                                    <input type="text" name="banner_title"  value="{{ $banner->banner_title }}" class="form-control">
                                 </div>
                                 <div class="col-xl-6 mt-2">
                                    <input type="text" name="banner_url"  value="{{ $banner->banner_url }}" class="form-control">
                                 </div>
                              </div>
                              <div class="row pt-3">
                                <div class="col-xl-8">
                                    <input type="file" name="banner_image">
                                </div>
                              </div>
                              <div class="row pt-3">
                                <div class="col-xl-8">
                                 <button type="submit" name="add_banner" class="btn vms-btn">Edit Banner</button>
                                </div>
                              </div>
                           </form>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
@include('admin.includes.footer')