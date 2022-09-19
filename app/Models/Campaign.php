<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Campaign
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon $from
 * @property \Illuminate\Support\Carbon $to
 * @property float $total
 * @property float $daily_budget
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\CampaignFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Campaign newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Campaign newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Campaign query()
 * @method static \Illuminate\Database\Eloquent\Builder|Campaign whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Campaign whereDailyBudget($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Campaign whereFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Campaign whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Campaign whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Campaign whereTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Campaign whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Campaign whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Campaign extends Model
{
    use HasFactory;

    /**
     * Fillable Fields
     *
     * @var array<string>
     */
    public $fillable = [
        "name",
        "from",
        "to",
        "total",
        "daily_budget"
    ];

    /**
     * Casting attributes
     *
     * @var array<string, string>
     */
    public $casts = [
        "from" => "datetime:Y-m-d H:m a",
        "to" => "datetime:Y-m-d H:m a",
        "create_at"  => "datetime:Y-m-d H:m a",
        "updated_at" => "datetime:Y-m-d H:m a"
    ];

    /**
     * Set From date to carbon instance.
     *
     * @param string $value
     * @return void
     */
    public function setFromAttribute( $value )
    {
        $this->attributes['from'] = (new Carbon($value))->format('d-m-y H:m');
    }

    /**
     * Set From date to carbon instance.
     *
     * @param string $value
     * @return void
     */
    public function setToAttribute( $value )
    {
        $this->attributes['to'] = (new Carbon($value))->format('d-m-y H:m');
    }
}
