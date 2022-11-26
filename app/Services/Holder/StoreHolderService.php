<?php

namespace App\Services\Holder;

use App\Models\Holder;

class StoreHolderService
{
    private Holder $holder;

    public function __construct(Holder $holder)
    {
        $this->holder = $holder;
    }

    public function run($data)
    {
        return $this->holder->create($data);
    }
}
