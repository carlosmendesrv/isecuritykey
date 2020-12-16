<?php


namespace App\Repositories;


use App\Models\Group;

class GroupRepository
{
    protected $group;

    public function __construct(Group $group)
    {
        $this->group = $group;
    }

    /**
     * @return mixed
     */
    public function index()
    {
        return $this->group
            ->where('instance_id', instanceId())
            ->orderBy('created_at','DESC')
            ->paginate(10);
    }

    /**
     * @param $request
     * @return mixed
     */
    public function store($request)
    {
        $request['instance_id'] = instanceId();
        return $this->group->create($request);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        $group = $this->group
            ->where('instance_id', instanceId())
            ->findOrFail($id);
        $group->delete();

        return $group;
    }
}
