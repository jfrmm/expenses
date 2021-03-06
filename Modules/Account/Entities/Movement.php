<?php
namespace Modules\Account\Entities;

use Modules\User\Entities\User;
use Modules\Account\Entities\Debt;
use Modules\Account\Entities\Credit;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\DedicatedFiltering\Sortable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Helpers\DedicatedFiltering\Searchable;

class Movement extends Model
{
    use SoftDeletes, Sortable, Searchable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'date',
        'amount',
        'description',
        'account_id',
        'creator_id',
        'creditor_id',
    ];

    /**
     * The attributes that should be used in search
     *
     * @var array
     */
    protected $searchable = [
        'description',
    ];

    public static function boot()
    {
        parent::boot();

        static::created(function ($model) {
            // create a Debt or Credit, depending on the Movement amount
            if ($model->amount < 0) {
                Debt::create(['movement_id' => $model->id]);
            } else {
                Credit::create(['movement_id' => $model->id]);
            }
        });

        static::updated(function ($model) {
            // update a Debt or Credit, depending on the Movement amount
            if ($model->amount !== $model->getOriginal('amount') &&
                 $model->amount * $model->getOriginal('amount') < 0) {
                if ($model->amount < 0) {
                    Credit::where('movement_id', $model->id)->delete();
                    Debt::create(['movement_id' => $model->id]);
                } else {
                    Debt::where('movement_id', $model->id)->delete();
                    Credit::create(['movement_id' => $model->id]);
                }
            }
        });

        static::deleted(function ($model) {
            // delete a Debt or Credit, depending on the Movement amount
            if ($model->amount < 0) {
                Debt::where('movement_id', $model->id)->delete();
            } else {
                Credit::where('movement_id', $model->id)->delete();
            }
        });
    }

    /**
     * A Movement belongs to one account
     */
    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    /**
     * The Movement's creator
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    /**
     * The Movement's creditor
     */
    public function creditor()
    {
        return $this->belongsTo(User::class, 'creditor_id');
    }
}
