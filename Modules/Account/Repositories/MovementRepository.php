<?php

namespace Modules\Account\Repositories;

use App\Repositories\Repository;
use Modules\Account\Entities\Movement;

class MovementRepository extends Repository
{
    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct(new Movement());
    }

    /**
     * Get all Movements of given Account
     *
     * @param int $accountId
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAllOfAccount($accountId)
    {
        return Movement::whereHas('account', function ($query) use ($accountId) {
            $query->where('id', $accountId);
        })->get();
    }
}
