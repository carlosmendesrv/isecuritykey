<?php


namespace App\Repositories;

use App\Models\Category;
use App\Models\Key;

class KeyRepository
{
    protected $key;
    protected $category;

    public function __construct(Key $key, Category $category)
    {
        $this->key = $key;
        $this->category = $category;
    }

    /**
     * @return mixed
     */
    public function index()
    {
        return $this->key
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
        $request['password'] = bcrypt($request['password']);
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
        return $this->key->findOrFail($id);
    }

}
