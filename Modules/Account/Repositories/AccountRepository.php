<?php

namespace Modules\Account\Repositories;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Modules\User\Entities\User;
use App\Repositories\Repository;
use Illuminate\Support\Facades\Auth;
use Modules\Account\Entities\Account;

class AccountRepository extends Repository
{
    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct(new Account());
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
            'name' => 'required|string|max:191',
            'iban' => 'required|string|unique:accounts|size:25',
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
            'name' => 'required|string|max:191',
            'iban' => [
                'required',
                'string',
                'size:25',
                Rule::unique('accounts')->ignore($request->id),
            ],
        ]);
    }

    /**
     * Get all Accounts, including owner, for a given User
     *
     * @param User $user
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAllOfUser($user = null)
    {
        if (is_null($user)) {
            $user = Auth::user();
        }

        $userAccounts = $user->accounts()->get();
        $ownedAccounts = $user->accountsOwned()->get();

        return $userAccounts->merge($ownedAccounts)->all();
    }

    /**
     * Create an Account, with the owner being the
     * currently logged in User
     *
     * @param array $data
     *
     * @return mixed
     */
    public function createWithOwner(array $data)
    {
        $data = array_merge($data, ['owner_id' => Auth::id()]);

        return parent::create($data);
    }
}
