<?php


namespace App\Repositories;

use App\Models\Category;
use App\Models\Key;
use http\Env\Request;
use Illuminate\Support\Facades\Crypt;

class KeyRepository
{
    protected $key;
    protected $category;
    protected $group;

    public function __construct(Key $key, Category $category, GroupRepository $groupRepository)
    {
        $this->key = $key;
        $this->category = $category;
        $this->group = $groupRepository;
    }

    /**
     * @return mixed
     */
    public function index($group)
    {
        return $this->key
            ->where('group_id', $group)
            ->where('is_private', false)
            ->orderBy('created_at', 'DESC')
            ->paginate(10);
    }

    /**
     * @param $request
     * @return mixed
     */
    public function store($request, $group)
    {
        $request['instance_id'] = instanceId();
        $request['group_id'] = $group;
        $request = $this->encrypted($request);
        return $this->key->create($request);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        return $this->key->findOrFail($id)->delete();
    }

    public function show($id)
    {
        $data = $this->key->findOrFail($id);
        return $this->decrypted($data);
    }

    protected function encrypted($request)
    {
        $request['password'] = Crypt::encrypt($request['password']);
        $request['username'] = Crypt::encrypt($request['username']);
        $request['url'] = Crypt::encrypt($request['url']);

        return $request;
    }

    protected function decrypted($request)
    {
        $request['password'] = Crypt::decrypt($request['password']);
        $request['username'] = Crypt::decrypt($request['username']);
        $request['url'] = Crypt::decrypt($request['url']);

        return $request;
    }

}
