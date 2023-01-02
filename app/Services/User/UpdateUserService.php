<?php

namespace App\Services\User;

class UpdateUserService
{
    public function run($data, $user)
    {
        $user->update($data);

        return $user;
    }
}
