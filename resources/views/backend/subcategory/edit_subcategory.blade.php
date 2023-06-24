@include('admin.includes.sidebar')
<div class="main_container">
   <div class="container">
       <div class="main-body">
               <div class="col-lg-8">
                   <div class="card">
                       <div class="card-body">
                           <form action="{{ route('update.subcategory') }}" class="" method="POST" enctype="multipart/form-data">
                              @csrf
                              <input type="hidden" name="id" id="" value="{{ $subcategories->id }}">
                              <div class="row pt-3">
                                 <div class="col-xl-6 ">
                                    <select name="category_id" id="" class="form-control mb-3" aria-label="Default select example">
                                        <option selected="">Select One Category</option>
                                        @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == $subcategories->category_id ? 'selected' : '' }}>{{ $category->category_name }}</option>
                                        @endforeach
                                        
                                    </select>
                                 </div>
                                 <div class="col-xl-6 mt-2">
                                    <input type="text" name="subcategory_name"  value="{{ $subcategories->subcategory_name }}" class="form-control">
                                 </div>
                              </div>
                              <div class="row">
                                 <button type="submit" name="add_category" class="btn vms-btn">Edit SubCategory</button>
                              </div>
                           </form>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
@include('admin.includes.footer')