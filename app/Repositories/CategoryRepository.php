<?php


namespace App\Repositories;

use App\Models\Category;

class CategoryRepository
{
    protected $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    /**
     * @return mixed
     */
    public function index()
    {
        return $this->category
            ->where('instance_id', instanceId())
            ->orderBy('created_at', 'DESC')
            ->paginate(10);
    }

    /**
     * @param $request
     * @return mixed
     */
    public function store($request)
    {
        $request['instance_id'] = instanceId();
        return $this->category->create($request);
    }

    public function update($request, $category)
    {
        try {
            $category->update($request);
            return redirect()->route('category.index')->with('success', 'Categoria atualizado com sucesso.');
        } catch (\Exception $exception) {
            return redirect()->route('category.index')->with('error', 'Ops! Caso o erro persista, contate o administrador do sistema.');
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        $category = $this->category
            ->where('instance_id', instanceId())
            ->findOrFail($id);
        $category->delete();

        return $category;
    }

    /**
     * @return mixed
     */
    public function getAllLists()
    {
        return $this->category
            ->where('instance_id', instanceId())
            ->orderBy('created_at', 'DESC')
            ->pluck('name', 'id');
    }
}
