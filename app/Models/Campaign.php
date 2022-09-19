<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;

    /**
     * Fillable Fields
     *
     * @var array
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
     * @var array
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
    public function setFromAttribute( $value ) {
        $this->attributes['from'] = (new Carbon($value))->format('d-m-y H:m');
    }

    /**
     * Set From date to carbon instance.
     *
     * @param string $value
     * @return void
     */
    public function setToAttribute( $value ) {
        $this->attributes['to'] = (new Carbon($value))->format('d-m-y H:m');
    }
}
