<?php

namespace App\Services\User;

use App\Models\User;

class StoreUserService
{
    private User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function run($data)
    {
        return $this->user->create($data);
    }
}
