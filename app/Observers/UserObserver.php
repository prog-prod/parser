<?php

namespace App\Observers;

use App\Enums\UserRoleEnum;
use App\Models\User;

class UserObserver
{
    /**
     * Handle the User "creating" event.
     *
     * @param User $user
     * @return void
     */
    public function creating(User $user) : void
    {
        // default role
        $user->role = UserRoleEnum::user()->value;
    }

    public function updating(User $user) : void
    {
        if ($user->email !== $user->getOriginal('email')) {
            // TODO : email checking and send mail to email with confirmation email updation
        }
    }
}
