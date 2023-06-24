@include('admin.includes.sidebar')
<div class="main_container">
   <div class="container">
       <div class="main-body">
               <div class="col-lg-8">
                   <div class="card pt-4 mt-3">
                    <div class="card-header">
                        <h4>Add Role</h4>
                    </div>
                       <div class="card-body">
                           <form action="{{ route('store.roles') }}" class="" method="POST" enctype="multipart/form-data">
                              @csrf
                              <div class="row">
                                 <div class="col-xl-10">
                                    <label for="Permission Name">Role Name</label>
                                    <input type="text" name="name"  placeholder="Role name" class="form-control">
                                 </div>
                              </div>
                              <div class="row mt-3">
                                 <button type="submit" name="add_role" class="btn vms-btn">Add Role</button>
                              </div>
                           </form>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
@include('admin.includes.footer')