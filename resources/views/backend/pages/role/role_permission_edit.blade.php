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
                           <form action="{{ route('roles.permission.updates',$roles->id) }}" class="" method="POST" enctype="multipart/form-data">
                              @csrf

                              <div class="row">
                                <div class="col-xl-10">
                                   <label for="Permission Name">Role Name</label>
                                   <input type="text" class="form-control" name="name" id="" value="{{ $roles->name }}">
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
                                    @php
                                    $permissions = App\Models\User::getpermissionByGroupName($item->group_name);
                                @endphp
                                   <div class="form-check">
                                       <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" {{ App\Models\User::roleHasPermissions($roles,$permissions) ? 'checked':'' }}>
                                       <label class="form-check-label" for="flexCheckDefault">{{ $item->group_name }}</label>
                                   </div>
                                </div>
                                
                                
                                <div class="col-9">
                                    @foreach ($permissions as $permission)
                                    <div class="form-check">
                                        <input class="form-check-input" name="permission[]" {{ $roles->hasPermissionTo($permission->name) ? 'checked' : '' }} type="checkbox" value="{{ $permission->id }}" id="flexCheckDefault{{ $permission->id }}">
                                        <label class="form-check-label" for="flexCheckDefault{{ $permission->id }}">{{ $permission->name }}</label>
                                    </div>
                                    @endforeach
                                    <br>
                                 </div>
                                
                             </div>
                              @endforeach
                              
                              <div class="row mt-3">
                                 <button type="submit" name="add_role" class="btn vms-btn">Edit Role</button>
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