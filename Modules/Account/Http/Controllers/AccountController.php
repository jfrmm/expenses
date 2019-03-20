<?php

namespace Modules\Account\Http\Controllers;

use Illuminate\Http\Request;
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
     * Constructor
     */
    public function __construct()
    {
        $model = new Account();
        parent::$model = $model;
        $this->accounts = new AccountRepository();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $accounts = $this->accounts->getAllOfUser();

        return view(
            'account::accounts.index',
            [
                'accounts' => $accounts,
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('account::accounts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validatedData = $this->accounts->validateCreate($request);

        $result = $this->accounts->createWithOwner($validatedData);

        $success = $result ? true : false;

        return redirect()
            ->route('account.accounts.index')
            ->with('message', self::getMessage('update', $success));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Account $account
     *
     * @return \Illuminate\View\View
     */
    public function edit(Account $account)
    {
        return view(
            'account::accounts.edit',
            [
                'account' => $account,
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Account $account
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Account $account)
    {
        $validatedData = $this->accounts->validateUpdate($request);

        $result = $this->accounts->update($validatedData, $account->id);

        $success = $result ? true : false;

        return redirect()
            ->route('account.accounts.index')
            ->with('message', self::getMessage('update', $success));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Account $account
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Account $account)
    {
        $result = $this->accounts->delete($account->id);

        $success = $result ? true : false;

        return redirect()
            ->route('account.accounts.index')
            ->with('message', self::getMessage('delete', $success));
    }
}
