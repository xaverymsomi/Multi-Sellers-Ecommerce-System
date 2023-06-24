@include('admin.includes.sidebar')
<div class="main_container">
   <div class="container">
       <div class="main-body">
               <div class="col-lg-8">
                   <div class="card pt-4 mt-3">
                       <div class="card-body">
                           <form action="{{ route('store.subcategory') }}" class="" method="POST" enctype="multipart/form-data">
                              @csrf
                              <div class="row">
                                 <div class="col-xl-6 ">
                                    <select name="category_id" id="" class="form-control mb-3" aria-label="Default select example">
                                        <option selected="">Select One Category</option>
                                        @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                        @endforeach
                                        
                                    </select>
                                 </div>
                              </div>
                              <div class="row">
                                <div class="col-xl-6 ">
                                   <input type="text" name="subcategory_name"  placeholder="SubCategory name" class="form-control">
                                </div>
                             </div>
                              <div class="row mt-3">
                                 <button type="submit" name="add_subcategory" class="btn vms-btn">Add SubCategory</button>
                              </div>
                           </form>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
@include('admin.includes.footer')