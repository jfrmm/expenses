<?php

namespace Modules\User\Repositories;

use Modules\User\Entities\User;
use App\Repositories\Repository;
use Modules\Account\Entities\Account;
use Illuminate\Database\Eloquent\Model;

class UserRepository extends Repository
{
    /**
     * Constructor
     */
    public function __construct(Model $model)
    {
        parent::__construct(new $model());
    }

    /**
     * Get all Users, for a given Account
     *
     * @param Account $account
     *
     * @return void
     */
    public function getAllOfAccount(Account $account)
    {
        $accountUsers = $account->users()->get();
        $accountOwner = $account->owner()->get();

        return $accountUsers->merge($accountOwner)->all();
    }

    /**
     * Detach a User from an Account
     *
     * @param Account $account
     * @param User $user
     *
     * @return int
     */
    public function detachFromAccount(Account $account, User $user)
    {
        if ($account->owner->id !== $user->id) {
            return $account->users()->detach($user->id);
        }
    }
}
