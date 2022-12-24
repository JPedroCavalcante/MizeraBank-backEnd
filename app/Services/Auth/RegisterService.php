<?php

namespace App\Services\Auth;

use App\Models\User;
use App\Traits\ApiResponser;

class RegisterService
{
    private User $user;
    use ApiResponser;

    /**
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function run($data)
    {
        $credential = $this->user->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        return $credential->createToken('API Token')->plainTextToken;
    }
}
