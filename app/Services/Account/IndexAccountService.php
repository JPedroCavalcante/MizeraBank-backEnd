<?php

namespace App\Services\Account;

use App\Models\Account;
use App\Models\Holder;

class IndexAccountService
{

    public function run($request)
    {
        $search = $request->search ?? null;

        return Account::where(function ($query) use ($search) {
            if ($search) {
                $query->where('holder_id', $search);
                $query->Orwhere('number', 'LIKE', "%{$search}%");
            }
        })->get();
    }
}
