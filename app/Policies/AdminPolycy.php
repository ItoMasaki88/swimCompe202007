<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminPolycy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * フォルダの閲覧権限
     * @param User $user
     * @return bool
     */
    public function view(User $user)
    {
        return $user->admin === 1;
    }
}
