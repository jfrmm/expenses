<?php

namespace Modules\Account\Entities\Movement;

use Illuminate\Database\Eloquent\Model;

class Credit extends Model
{
    protected $fillable = [
        'movement_id',
    ];

    public function type()
    {
        return $this->hasOne(CreditType::class);
    }
}
