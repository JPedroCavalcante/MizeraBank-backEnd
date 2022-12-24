<?php

namespace App\Services\Account;

use App\Models\Account;

class DeleteAccountService
{
    private Account $account;

    public function __construct(Account $account)
    {
        $this->account = $account;
    }

    public function run($id)
    {
        $account = $this->account->where('id', $id)->firstOrfail();

        return $account->delete();
    }
}
