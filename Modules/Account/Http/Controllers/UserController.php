<?php

namespace Modules\Account\Http\Controllers;

use Modules\User\Entities\User;
use App\Http\Controllers\Controller;
use Modules\Account\Entities\Account;
use Modules\User\Repositories\UserRepository;

class UserController extends Controller
{
    /**
     * @var UserRepository
     */
    private $users;

    /**
     * Constructor
     */
    public function __construct()
    {
        $model = new User();
        parent::$model = $model;
        $this->users = new UserRepository($model);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Account $account)
    {
        $users = $this->users->getAllOfAccount($account);

        return view(
            'account::accounts.users.index',
            [
                'account' => $account,
                'users' => $users,
            ]
        );
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param Account $account
     * @param User $user
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Account $account, User $user)
    {
        $result = $this->users->detachFromAccount($account, $user);

        $success = $result ? true : false;

        return redirect()
            ->route('account.accounts.users.index', ['account' => $account])
            ->with('message', self::getMessage('delete', $success));
    }
}
