<?php

namespace Modules\Account\Repositories;

use Illuminate\Http\Request;
use App\Repositories\Repository;
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

    public function validateUpdate(Request $request)
    {
        // dd($request->request);

        return $request->validate([
            'name' => 'required|string|max:191',
            'iban' => 'required|string|size:25',
        ]);
    }

    /**
     * Get all Accounts, including Owner
     *
     * @return void
     */
    public function getAllWithOwner()
    {
        return Account::with('owner')->get();
    }
}
