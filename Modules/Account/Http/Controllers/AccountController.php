<?php

namespace Modules\Account\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Modules\Account\Entities\Account;
use Modules\Account\Repositories\AccountRepository;

class AccountController extends Controller
{
    /**
     * @var AccountRepository
     */
    private $accounts;

    /**
     * @param AccountRepository $accountRepository
     */
    public function __construct()
    {
        $this->accounts = new AccountRepository();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $accounts = $this->accounts->getAllWithOwner();

        return view('account::accounts.index', ['accounts' => $accounts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('account::accounts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $validatedData = $this->accounts->validateCreate($request);

        $success = $this->accounts->create($validatedData);

        if ($success) {
            return redirect()
                ->route('account.accounts.index')
                ->with('message', 'Account created successfuly.');
        } else {
            return redirect()
                ->route('account.accounts.index')
                ->with('message', 'Failed creating account.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return Response
     */
    public function edit(Account $account)
    {
        return view('account::accounts.edit', ['account' => $account]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Account $account
     *
     * @return void
     */
    public function update(Request $request, Account $account)
    {
        $validatedData = $this->accounts->validateUpdate($request);

        $success = $this->accounts->update($validatedData, $account->id);

        if ($success) {
            return redirect()
                ->route('account.accounts.index')
                ->with('message', 'Account updated successfuly.');
        } else {
            return redirect()
                ->route('account.accounts.index')
                ->with('message', 'Failed updating account.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return Response
     */
    public function destroy(Account $account)
    {
        $success = $this->accounts->delete($account->id);

        if ($success) {
            return redirect()
                ->route('account.accounts.index')
                ->with('message', 'Account deleted successfuly.');
        } else {
            return redirect()
                ->route('account.accounts.index')
                ->with('message', 'Failed deleting account.');
        }
    }
}
