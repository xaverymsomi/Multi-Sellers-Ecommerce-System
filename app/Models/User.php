<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // User Active Now
    public function OnlineUsers(){
        return Cache::has('user-is-online' . $this->id);
    }
    // End Method

    public static function getPermissionGroups(){
        $permission_group = DB::table('permissions')->select('group_name')->groupBy('group_name')->get();
        return $permission_group;
    }
    // End Method

    public static function getpermissionByGroupName($group_name){
        $permissions = DB::table('permissions')
                            ->select('name','id')
                            ->where('group_name',$group_name)
                            ->get();
        return $permissions;
    }
    // End Method

    public static function roleHasPermissions($roles,$permissions){
        $hasPermission = true;
        foreach ($permissions as $key => $permission) {
            # code...
            if (!$roles->hasPermissionTo($permission->name)) {
                $hasPermission = false;
                return $hasPermission;
            }
            return $hasPermission;
        }
    }
    // End Method

}
