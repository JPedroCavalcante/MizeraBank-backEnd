<?php

namespace App\Services\Account;

use App\Exceptions\HolderNotFound;
use App\Models\Account;
use App\Models\Holder;

class StoreAccountService
{
    private Account $account;

    public function __construct(Account $account)
    {
        $this->account = $account;
    }

    public function run($data)
    {
        return $this->account->create($data);
    }
}
