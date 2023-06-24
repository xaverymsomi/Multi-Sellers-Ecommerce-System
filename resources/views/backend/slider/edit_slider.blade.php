@include('admin.includes.sidebar')
<div class="main_container">
   <div class="container">
       <div class="main-body">
        <h3>Edit Slider</h3>
               <div class="col-lg-8">
                   <div class="card">
                       <div class="card-body">
                           <form action="{{ route('update.slider') }}" class="" method="POST" enctype="multipart/form-data">
                              @csrf
                              <input type="hidden" name="id" value="{{ $slider->id }}">
                              <input type="hidden" name="image" value="{{ $slider->category_image }}">
                              <div class="row pt-3">
                                 <div class="col-xl-6 ">
                                    <input type="text" name="slider_title"  value="{{ $slider->slider_title }}" class="form-control">
                                 </div>
                                 <div class="col-xl-6 mt-2">
                                    <input type="text" name="slider_short_title"  value="{{ $slider->slider_short_title }}" class="form-control">
                                 </div>
                              </div>
                              <div class="row pt-3">
                                <div class="col-xl-8">
                                    <input type="file" name="slider_image">
                                </div>
                              </div>
                              <div class="row pt-3">
                                <div class="col-xl-8">
                                 <button type="submit" name="add_slider" class="btn vms-btn">Edit Slider</button>
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