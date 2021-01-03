<?php


namespace App\Validator;

use Illuminate\Http\Request as validate;
use Spatie\Permission\Models\Role;

class RoleValidator
{
    private const RESPONSE = 'response';
    private $rules;

    protected $role;

    public function __construct(Role $role)
    {
        $this->role = $role;
        $this->rules = [
            'name' => 'required|max:255|unique',
        ];
    }

    public function createRules()
    {
        return [
            'name' => 'required',
        ];
    }

    public function createRole($data)
    {
//        foreach ($this->createRules() as $key => $value) {
//            if (!array_key_exists($key, $data)) {
//                return [self::RESPONSE => false, 'message' => $value];
//            }
//        }
//
//        if(!$this->nameValidator($data['name'])){
//            return [self::RESPONSE => false, 'message' => 'not unique name'];
//        }
//       $data =  $this->va($data, $this->rules);
//        dd($data);
//        return $data;
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
