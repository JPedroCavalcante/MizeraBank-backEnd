<?php

namespace App\Services\Account;

use App\Models\Account;
use App\Models\Holder;

class IndexAccountService
{
    private Account $account;
    private Holder $holder;

    public function __construct(Account $account, Holder $holder)
    {
        $this->account = $account;
        $this->holder = $holder;
    }

    public function run($request)
    {
        $search = $request->search ?? null;

        return Account::where(function ($query) use ($search) {
            if ($search) {
                $query->where('holder_id', $search);
                $query->Orwhen();
            }
        })->get();
    }
}
