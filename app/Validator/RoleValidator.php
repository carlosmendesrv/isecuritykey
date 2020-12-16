<?php


namespace App\Validator;


use Spatie\Permission\Models\Role;

class RoleValidator
{
    private const RESPONSE = 'response';
    protected $role;

    public function __construct(Role $role)
    {
        $this->role = $role;
    }

    public function createRules()
    {
        return [
            'name' => 'required',
        ];
    }

    public function createRole($data)
    {
        foreach ($this->createRules() as $key => $value) {
            if (!array_key_exists($key, $data)) {
                return [self::RESPONSE => false, 'message' => $value];
            }
        }

        if(!$this->nameValidator($data['name'])){
            return [self::RESPONSE => false, 'message' => 'not unique name'];
        }

        return [self::RESPONSE => true];
    }

    public function nameValidator($name)
    {
        return !$this->role->where('name', instanceName()."_".$name)->exists();
    }

    public function validateInstance($id)
    {
        $roleModel = $this->role->findOrFail($id);
        $name = instanceName();
        $pos = strpos($roleModel->name, $name);

        return !is_bool($pos);
    }

}
