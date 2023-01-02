<?php

namespace App\Http\Requests\User;

use App\Models\User;

class DeleteUserService
{
    private User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function run($id)
    {
        $user = $this->user->where('id', $id)->firstOrfail;

        return $user->delete();
    }
}
