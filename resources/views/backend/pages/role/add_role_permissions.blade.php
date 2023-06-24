@include('admin.includes.sidebar')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<div class="main_container">
   <div class="container">
       <div class="main-body">
               <div class="col-lg-12">
                   <div class="card pt-4 mt-3">
                    <div class="card-header">
                        <h4>Add Role In Permission</h4>
                    </div>
                       <div class="card-body">
                           <form action="{{ route('role.permission.store') }}" class="" method="POST" enctype="multipart/form-data">
                              @csrf

                              <div class="row">
                                <div class="col-xl-10">
                                   <label for="Permission Name">Role Name</label>
                                   <select name="role_id" class="form-control mb-3" aria-label="Default select example">
                                    <option selected="">Open this select role</option>
                                    @foreach ($roles as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                    
                                </select>
                                </div>
                             </div>
                             <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefaultAll">
                                <label class="form-check-label" for="flexCheckDefaultAll">All permission</label>
                            </div>
                             <hr>
                              @foreach ($role_permission_group as $item)
                              <div class="row">
                                <div class="col-3">
                                   <div class="form-check">
                                       <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                       <label class="form-check-label" for="flexCheckDefault">{{ $item->group_name }}</label>
                                   </div>
                                </div>
                                @php
                                    $permissions = App\Models\User::getpermissionByGroupName($item->group_name);
                                @endphp
                                
                                <div class="col-9">
                                    @foreach ($permissions as $permission)
                                    <div class="form-check">
                                        <input class="form-check-input" name="permission[]" type="checkbox" value="{{ $permission->id }}" id="flexCheckDefault{{ $permission->id }}">
                                        <label class="form-check-label" for="flexCheckDefault{{ $permission->id }}">{{ $permission->name }}</label>
                                    </div>
                                    @endforeach
                                    <br>
                                 </div>
                                
                             </div>
                              @endforeach
                              
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
   <br><br>

   <script type="text/javascript">
       $(document).ready(function() {
           $('#flexCheckDefaultAll').click(function() {
               if ($(this).is(':checked')) {
                   $('input[type=checkbox]').prop('checked', true);
               } else {
                   $('input[type=checkbox]').prop('checked', false);
               }
           });
       });
   </script>   
@include('admin.includes.footer')