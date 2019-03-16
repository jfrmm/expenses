<?php

namespace Modules\Account\Repositories;

use Illuminate\Http\Request;
use App\Repositories\Repository;
use Illuminate\Support\Facades\Auth;
use Modules\Account\Entities\Account;
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
     * Validate the create request
     *
     * @param Request $request
     *
     * @return array
     */
    public function validateCreate(Request $request)
    {
        return $request->validate([
            'date' => 'required|date',
            'amount' => 'required|numeric',
            'description' => 'required|string|max:255',
        ]);
    }

    /**
     * Validate the update request
     *
     * @param Request $request
     *
     * @return array
     */
    public function validateUpdate(Request $request)
    {
        return $request->validate([
            'date' => 'required|date',
            'amount' => 'required|numeric',
            'description' => 'required|string|max:255',
        ]);
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

    /**
     * Create a Movement, for a specific Account
     *
     * @param array $data
     * @param Account $account
     *
     * @return mixed
     */
    public function createForAccount(array $data, Account $account)
    {
        $extraData = [
            'account_id' => $account->id,
            'creator_id' => Auth::id(),
        ];

        $data = array_merge($data, $extraData);

        return parent::create($data);
    }
}
