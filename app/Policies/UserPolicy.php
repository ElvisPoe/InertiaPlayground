<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function create(User $user)
    {
        return $user->email === 'admin@inertiatest.com';
    }

    public function edit(User $user)
    {
        return (bool) mt_rand(0, 1);
    }

    public function delete(User $user)
    {
        return (bool) mt_rand(0, 1);
    }
}
