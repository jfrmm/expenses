<?php

namespace Modules\User\Entities;

use Modules\Account\Entities\Account;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * A User belongs to many Accounts
     */
    public function accounts()
    {
        return $this->belongsToMany(Account::class);
    }

    /**
     * A User owns many Accounts
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function accountsOwned()
    {
        return $this->hasMany(Account::class, 'owner_id');
    }
}
