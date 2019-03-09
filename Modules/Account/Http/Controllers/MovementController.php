<?php

namespace Modules\Account\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Account\Repositories\MovementRepository;

class MovementController extends Controller
{
    /**
     * @var MovementRepository
     */
    private $movements;

    /**
     * @param MovementRepository $movementRepository
     */
    public function __construct()
    {
        $this->movements = new MovementRepository();
    }

    /**
     * Display a listing of the resource.
     *
     * @param int $accountId
     *
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index($accountId)
    {
        $movements = $this->movements->getAllOfAccount($accountId);

        return view('account::accounts.movements.index', ['movements' => $movements]);
    }
}
