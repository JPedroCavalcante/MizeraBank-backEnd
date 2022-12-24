<?php

namespace App\Services\Account;

class UpdateAccountService
{
    public function run($data, $account)
    {
        $account->update($data);

        return $account;
    }
}
