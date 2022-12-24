<?php

namespace App\Services\Agency;

class UpdateAgencyService
{
    public function run($data, $agency)
    {
        $agency->update($data);

        return $agency;
    }
}
