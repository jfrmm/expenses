<?php

namespace Modules\Account\Entities\Movement;

use Illuminate\Database\Eloquent\Model;

class CreditType extends Model
{
    protected $fillable = [
        'name',
    ];
}
