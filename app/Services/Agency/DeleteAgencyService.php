<?php

namespace App\Services\Agency;

use App\Models\Agency;

class DeleteAgencyService
{
    private Agency $agency;

    public function __construct(Agency $agency)
    {
        $this->agency = $agency;
    }

    public function run($id)
    {
        $agency = $this->agency->where('id', $id)->firstOrfail();

        return $agency->delete();
    }
}
