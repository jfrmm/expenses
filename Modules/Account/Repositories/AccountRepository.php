<?php
namespace Modules\Account\Repositories;

use App\Repositories\BaseRepository;
use Modules\Account\Entities\Account;

class AccountRepository extends BaseRepository
{
    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct(new Account());
    }
}
