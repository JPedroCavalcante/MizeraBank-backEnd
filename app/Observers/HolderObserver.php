<?php

namespace App\Observers;

use App\Models\Holder;
use Carbon\Carbon;

class HolderObserver
{
    /**
     * Handle the Holder "created" event.
     *
     * @param  \App\Models\Holder  $holder
     * @return void
     */
    public function created(Holder $holder)
    {
        //
    }

    /**
     * Handle the Holder "updated" event.
     *
     * @param  \App\Models\Holder  $holder
     * @return void
     */
    public function updated(Holder $holder)
    {
        //
    }

    public function deleted(Holder $holder)
    {
        $holder->update([
           'identifier' => Carbon::now()->format('d-m-Y') . '::' . $holder->identifier
        ]);
    }

    /**
     * Handle the Holder "restored" event.
     *
     * @param  \App\Models\Holder  $holder
     * @return void
     */
    public function restored(Holder $holder)
    {
        //
    }

    /**
     * Handle the Holder "force deleted" event.
     *
     * @param  \App\Models\Holder  $holder
     * @return void
     */
    public function forceDeleted(Holder $holder)
    {
        //
    }
}
