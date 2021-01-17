<?php


namespace App\Repositories;


use App\Models\Category;
use App\Models\Key;
use Illuminate\Support\Facades\Auth;

class DashboardRepository
{
    protected $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function index()
    {
        dd(Auth::user()->instance);
        $keyCount = Key::all()
            ->count();
        dd($keyCount);
    }
}
