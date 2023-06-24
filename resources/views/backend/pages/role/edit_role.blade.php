@include('admin.includes.sidebar')
<div class="main_container">
   <div class="container">
       <div class="main-body">
               <div class="col-lg-8">
                   <div class="card pt-4 mt-3">
                    <div class="card-header">
                        <h4>Edit Role</h4>
                    </div>
                       <div class="card-body">

                    
                        <form action="{{ route('update.role') }}" class="" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $role->id }}">
                            <div class="row">
                               <div class="col-xl-8">
                                  <label for="Permission Name">Role Name</label>
                                  <input type="text" name="name"  value="{{ $role->name }}" class="form-control">
                               </div>
                            </div>
                            <div class="row mt-3">
                               <button type="submit" name="edit_role" class="btn vms-btn">Edit Role</button>
                            </div>
                         </form>


                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
@include('admin.includes.footer')