<?php

namespace App\Services\Holder;

use App\Models\Holder;

class DeleteHolderService
{
    private Holder $holder;

    /**
     * @param Holder $holder
     */
    public function __construct(Holder $holder)
    {
        $this->holder = $holder;
    }


    public function run($id)
    {
        $holder = $this->holder->where('id', $id)->firstOrFail();

        return $holder->delete();
    }
}
