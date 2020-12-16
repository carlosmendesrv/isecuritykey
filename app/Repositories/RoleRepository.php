<?php


namespace App\Repositories;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleRepository
{
    private const PERMISSIONS = 'permissions';
    private const SUCCESS = 'success';
    protected $role;

    protected $permission;

    protected $user;

    public function __construct(Role $role, Permission $permission, User $user)
    {
        $this->role = $role;
        $this->permission = $permission;
        $this->user = $user;
    }

    public function instanceName()
    {
        return instanceName();
    }

    public function getAll()
    {
        $roles = $this->role
            ->where('name' , 'owner')
            ->orWhere('name', 'LIKE', "%{$this->instanceName()}%")
            ->get();
        $response = [];
        foreach($roles as $role){
            $response[] = [
                'role' => $role,
                self::PERMISSIONS => $role->permissions
            ];
        }
        return $response;
    }

    public function store($data)
    {
        return $this->role->create(['name' => $this->instanceName(). '_'.$data['name'], 'guard_name' => 'web', 'instance_id' => instanceId()]);
    }

    public function assignPermission($data)
    {
        $roleModel = $this->role->findOrFail($data['role_id']);
        $permissions = json_decode($data[self::PERMISSIONS]);
        foreach ($permissions as $id){
            $permissionModel = $this->permission->findOrFail($id);
            $roleModel->givePermissionTo($permissionModel->name);
        }
        return response()->json(self::SUCCESS, 200);
    }

    public function revokePermission($data)
    {
        $roleModel = $this->role->findOrFail($data['role_id']);
        $permissions = json_decode($data[self::PERMISSIONS]);
        foreach ($permissions as $id){
            $permissionModel = $this->permission->findOrFail($id);
            $roleModel->revokePermissionTo($permissionModel->name);
        }
        return response()->json(self::SUCCESS, 200);
    }


    public function destroy($id)
    {
        $roleModel = $this->role->findOrFail($id);
        if(!is_null($roleModel->users()->first())){
            return response()->json('This role is not empty. Please remove from this role users first.', 422);
        }
        $this->revokeAllPermissions($roleModel);
        $roleModel->delete();
        return response()->json(null, 204);
    }

    public function revokeAllPermissions($role)
    {
        $permissions = $this->permission->all();
        foreach($permissions as $permission){
            $role->revokePermissionTo($permission->name);
        }
        return true;
    }
}
