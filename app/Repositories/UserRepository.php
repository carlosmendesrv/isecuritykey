<?php


namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Role;

class UserRepository
{
    protected $user;

    public function __construct(User $user, InstanceRepository $instance)
    {
        $this->instance = $instance;
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function index()
    {
        return $this->user
            ->where('instance_id', instanceId())
            ->Where('is_enabled', true)
            ->orderBy('created_at', 'DESC')
            ->paginate(10);
        Log::info('Listing all user - Instance: ' . InstanceId());
    }

    /**
     * @param $request
     * @return mixed
     */
    public function store($request)
    {
        $request['instance_id'] = instanceId();
        $request['password'] = bcrypt($request['password']);
        $user = $this->user->create($request);
        $user->assignRole($request->input('roles'));

        return $user;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        $user = $this->user
            ->where('instance_id', instanceId())
            ->findOrFail($id);
        $user->delete();

        return $user;
    }

    /**
     * @param $data
     * @return false
     */
    public function registerUserOwner($data)
    {
        $instance = $this->createInstance($data['instance']);
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'instance_id' => $instance->id
        ]);

        return $user->assignRole('Admin');
    }

    /**
     * @param $data
     * @return false
     */
    public function createInstance($data)
    {
        try {
            return $this->instance->create($data);
        } catch (\Exception $exception) {
            return false;
        }
    }

    /**
     * @param $user
     * @return false
     */
//    public function createRoleOwner($user)
//    {
//        $role = Role::create([
//            'name' => 'Admin',
//            'instance_id' => $user->instance->id
//        ]);
//        return $user->assignRole($role->name);
//    }
}
