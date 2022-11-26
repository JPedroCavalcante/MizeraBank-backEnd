<?php

namespace App\Services\Account;

use App\Exceptions\HolderNotFound;
use App\Models\Account;
use App\Models\Holder;

class StoreAccountService
{
    private Account $account;
    private Holder $holder;

    public function __construct(Account $account, Holder $holder)
    {
        $this->account = $account;
        $this->holder = $holder;
    }

    public function run($data)
    {
        if(!$this->holder->find($data['holder_id'])){
            throw new HolderNotFound();
        }

        return $this->account->create($data);
    }
}
