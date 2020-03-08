<?php

namespace Modules\Account\Repositories;

use App\Repositories\Repository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Account\Entities\Account;
use Modules\Account\Entities\Movement\Movement;
use Modules\Account\Entities\Movement\MovementImport;

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
    public function getAllOfAccount(int $accountId)
    {
        return Movement::whereHas('account', function ($query) use ($accountId) {
            $query->where('id', $accountId);
        })->get();
    }

    /**
     * Create a Movement, for a specific Account
     *
     * @param array   $data
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

    /**
     * Import Movements, for a specific Account
     *
     * @param Account $account
     *
     * @return bool
     */
    public function importForAccount(Request $request, Account $account): bool
    {
        try {
            $file = $request->file('movements');

            if (!is_null($file) && $file->isValid()) {
                Excel::import(
                    new MovementImport($account->id, Auth::id()),
                    $file,
                    \Maatwebsite\Excel\Excel::CSV
                );

                return true;
            }

            return false;
        } catch (Exception $exception) {
            throw $exception;
        }
    }
}
