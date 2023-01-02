<?php

namespace App\Services\User;

use App\Models\User;

class IndexUserService
{
    private User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function run($request)
    {
        $search = $request->search ?? null;

        return User::where(function ($query) use ($search) {
            if ($search) {
                $query->where('name', 'LIKE', "%{$search}%")
                    ->Orwhere('email', $search);
            }
        })
            ->with([
                'role'
            ])
            ->get();
    }
}
