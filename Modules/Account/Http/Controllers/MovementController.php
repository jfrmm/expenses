<?php

namespace Modules\Account\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Account\Entities\Account;
use Modules\Account\Entities\Movement;
use Modules\Account\Repositories\MovementRepository;

class MovementController extends Controller
{
    /**
     * @var MovementRepository
     */
    private $movements;

    /**
     * Constructor
     */
    public function __construct()
    {
        $model = new Movement();
        parent::$model = $model;
        $this->movements = new MovementRepository();
    }

    /**
     * Display a listing of the resource.
     *
     * @param Account $account
     *
     * @return \Illuminate\View\View
     */
    public function index(Account $account)
    {
        $movements = $this->movements->getAllOfAccount($account->id);

        return view(
            'account::accounts.movements.index',
            [
                'account' => $account,
                'movements' => $movements,
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Account $account
     *
     * @return \Illuminate\View\View
     */
    public function create(Account $account)
    {
        return view(
            'account::accounts.movements.create',
            [
                'account' => $account,
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param Account $account
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, Account $account)
    {
        $validatedData = $this->movements->validateCreate($request);

        $result = $this->movements->createForAccount($validatedData, $account);

        $success = $result ? true : false;

        return redirect()
            ->route(
                'account.accounts.movements.index',
                [
                    'account' => $account,
                ]
            )
            ->with('message', self::getMessage('update', $success));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Account $account
     * @param Movement $movement
     *
     * @return \Illuminate\View\View
     */
    public function edit(Account $account, Movement $movement)
    {
        return view(
            'account::accounts.movements.edit',
            [
                'account' => $account,
                'movement' => $movement,
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Account $account
     * @param Movement $movement
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Account $account, Movement $movement)
    {
        $validatedData = $this->movements->validateUpdate($request);

        $result = $this->movements->update($validatedData, $movement->id);

        $success = $result ? true : false;

        return redirect()
            ->route(
                'account.accounts.movements.index',
                [
                    'account' => $account,
                    'movement' => $movement,
                ]
            )
            ->with('message', self::getMessage('update', $success));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Account $account
     * @param Movement $movement
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Account $account, Movement $movement)
    {
        $result = $this->movements->delete($movement->id);

        $success = $result ? true : false;

        return redirect()
            ->route(
                'account.accounts.movements.index',
                [
                    'account' => $account,
                ]
            )
            ->with('message', self::getMessage('update', $success));
    }

    /**
     * Import movements from an external file to the account
     *
     * @param Account $account
     *
     * @return void
     */
    public function import(Account $account)
    {
        // TODO:
    }
}
