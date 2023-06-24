@include('admin.includes.sidebar')
<div class="main_container">
   <div class="container">
       <div class="main-body">
               <div class="col-lg-8">
                   <div class="card pt-4 mt-3">
                       <div class="card-body">
                           <form action="{{ route('store.slider') }}" class="" method="POST" enctype="multipart/form-data">
                              @csrf
                              <div class="row">
                                <label for="title">Slider Name</label>
                                 <div class="col-xl-8">
                                    <input type="text" name="slider_title"  placeholder="Slider title" class="form-control">
                                 </div>
                              </div>
                              <div class="row">
                                <label for="short title">Short Name</label>
                                <div class="col-xl-8">
                                   <input type="text" name="slider_short_title"  placeholder="Short slider title" class="form-control">
                                </div>
                             </div>
                              <div class="row">
                                <label for="Image">Image</label>
                                 <div class="col-xl-6 mt-2">
                                    <input type="file" name="slider_image">
                                 </div>
                              </div>
                              <div class="row mt-3">
                                 <button type="submit" name="add_slider" class="btn vms-btn">Add Slider</button>
                              </div>
                           </form>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
@include('admin.includes.footer')