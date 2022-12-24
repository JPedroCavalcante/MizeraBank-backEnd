<?php

namespace App\Services\Agency;

use App\Models\Agency;

class StoreAgencyService
{
    private Agency $agency;

    public function __construct(Agency $agency)
    {
        $this->agency = $agency;
    }

    public function run($data)
    {
        return $this->agency->create($data);
    }
}
