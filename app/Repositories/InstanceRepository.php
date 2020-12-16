<?php

namespace App\Repositories;

use App\Models\Instance;

class InstanceRepository
{
    protected $instance;

    public function __construct(Instance $instance)
    {
        return $this->instance = $instance;
    }

    public function create($data)
    {
        $instance = $this->instance->create([
            'name' => $data
        ]);

        return $instance;
    }

}
