<?php

namespace App\Http\Controllers;

use App\Http\Requests\KeyRequest;
use App\Models\Category;
use App\Models\Group;
use App\Models\Key;
use App\Repositories\CategoryRepository;
use App\Repositories\GroupRepository;
use App\Repositories\KeyRepository;
use Illuminate\Http\Request;

class KeyController extends Controller
{

    protected $repository;
    protected $category;
    protected $group;

    public function __construct(KeyRepository $repository, CategoryRepository $category, GroupRepository $group)
    {
        $this->repository = $repository;
        $this->category = $category;
        $this->group = $group;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $group = $request->group;
        $keys = $this->repository->index($group);
        return view('key.index', compact('keys','group'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $group = $request->group;
        $categories = $this->category->getAllLists();
        return view('key.create', compact('group','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KeyRequest $request, $group)
    {
        $groups = $request->group;
        $this->repository->store($request->all(),$group);
        return redirect()->route('group.key.index',$groups);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\KeyVault $key
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group, Key $key)
    {
        $key = $this->repository->show($key->id);
        return view('key.show',compact('group','key'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\KeyVault  $keyVault
     * @return \Illuminate\Http\Response
     */
    public function edit(KeyVault $keyVault)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\KeyVault  $keyVault
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KeyVault $keyVault)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Key  $key
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group, Key $key)
    {
        $this->repository->destroy($key->id);
        return redirect()->route('group.key.index',$group)->with('success', 'Senha deletada.');
    }
}
