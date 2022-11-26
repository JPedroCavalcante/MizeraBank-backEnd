<?php

namespace App\Services\Holder;

use App\Models\Holder;

class UpdateHolderService
{
    public function run($data, $holder)
    {
        $holder->update($data);

        return $holder;
    }
}
