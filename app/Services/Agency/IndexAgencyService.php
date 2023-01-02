<?php

namespace App\Services\Agency;

use App\Models\Agency;

class IndexAgencyService
{

    public function run($request)
    {
        $search = $request->search ?? null;

        return Agency::where(function ($query) use ($search) {
            if ($search) {
                $query->where('name', 'LIKE', "%{$search}%")
                      ->Orwhere('id', $search);
            }
        })->get();
    }
}
