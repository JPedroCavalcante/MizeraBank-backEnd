<?php

namespace App\Services\Holder;

class UpdateHolderService
{
    public function run($data, $holder)
    {
        $holder->update($data);

        return $holder;
    }
}
