<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
     // All permissions
    public function permission(){
        $permissions = Permission::all();
        return view('backend.pages.permission.all_permission',compact('permissions'));
    }
    // End Method

    public function addpermission(){
        return view('backend.pages.permission.addpermission');
    }
    // End Method

    public function storepermission(Request $request){

        $permission = Permission::create([
            'name' => $request->name,
            'group_name' => $request->group_name,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Permission inserted successfuly',
            'alert-type' => 'success'
        );

        return redirect()->route('users.permission')->with($notification); 

    }
    // End Method

    public function edit_permission($id){
        $permission = Permission::findOrFail($id);
        return view('backend.pages.permission.edit_permission',compact('permission'));
    }
    // End Method

    public function update_permission(Request $request){
        $permission_id = $request->id;

        Permission::findOrFail($permission_id)->update([
            'name' => $request->name,
            'group_name' => $request->group_name,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Permission Updated successfuly',
            'alert-type' => 'success'
        );

        return redirect()->route('users.permission')->with($notification);
    }
    // End Method 

    public function destroy_permission($id)
    {
        $permission = Permission::findOrFail($id);
        

        Permission::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Permission Deleted successfuly',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification); 
    }
    // End Method



     // All roles
     public function roles(){
        $roles = Role::all();
        return view('backend.pages.role.all_role',compact('roles'));
     }
    //  End Method

    public function addrole(){
        return view('backend.pages.role.addrole');
    }
    // End Method

    public function storeroles(Request $request){

        $roles = Role::create([
            'name' => $request->name,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Role inserted successfuly',
            'alert-type' => 'success'
        );

        return redirect()->route('users.roles')->with($notification);

    }
    // End Method

    public function edit_role($id){
        $role = Role::findOrFail($id);
        return view('backend.pages.role.edit_role',compact('role'));
    }
    // End Method

    public function update_role(Request $request){
        $role_id = $request->id;

        Role::findOrFail($role_id)->update([
            'name' => $request->name,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Role Updated successfuly',
            'alert-type' => 'success'
        );

        return redirect()->route('users.roles')->with($notification);
    }
    // End Method 

    public function destroy_role($id)
    {
        Role::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Role Deleted successfuly',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification); 
    }
    // End Method

    // Users Role in Permissions 
    public function roles_permissions(){

        $roles = Role::all();
        $permissions = Permission::all();
        $role_permission_group = User::getPermissionGroups();
        return view('backend.pages.role.add_role_permissions',compact('roles','permissions','role_permission_group'));

    }
    // End Method

    public function roles_permission_store(Request $request){
        $data = array();
        $permissions = $request->permission;

        foreach ($permissions as $key => $item) {
            $data['role_id'] = $request->role_id;
            $data['permission_id'] = $item;
            DB::table('role_has_permissions')->insert($data);
        }

        $notification = array(
            'message' => 'Role & Permission Added successfuly',
            'alert-type' => 'success'
        );

        return redirect()->route('all.roles.permissions')->with($notification);
    }
    // End Method

    public function allRolePermission(){
        $roles = Role::all();
        return view('backend.pages.role.all_role_permission',compact('roles'));
     }
    //  End Method

    public function edit_all_role_permission($id){
        $roles = Role::findOrFail($id);
        $permissions = Permission::all();
        $role_permission_group = User::getPermissionGroups();
        return view('backend.pages.role.role_permission_edit',compact('roles','permissions','role_permission_group'));
    }
    // End Method

    public function admin_update_role(Request $request,$id){
        $roles = Role::findOrFail($id);
        $permissions = $request->permission;

        if (!empty($permissions)) {
            $roles->syncPermissions($permissions);
        }
        $notification = array(
            'message' => 'Role Permission Updated successfuly',
            'alert-type' => 'success'
        );

        return redirect()->route('all.roles.permissions')->with($notification);
    }
    // End Method

    public function delete_role_permission($id){
        $role = Role::findOrFail($id);
        if(!is_null($role)){
            $role->delete();
        }
        $notification = array(
            'message' => 'Role Permission Deleted successfuly',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
    // End Method
}
