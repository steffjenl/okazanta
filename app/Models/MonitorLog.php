<?php

namespace CachetHQ\Cachet\Models;

use AltThree\Validator\ValidatingTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * This is the metric point model class.
 *
 * @author Stephan Eizinga <stephan@monkeysoft.nl>
 */
class MonitorLog extends Model
{
    use ValidatingTrait;

    /**
     * Get the metric relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function monitor()
    {
        return $this->belongsTo(Monitor::class);
    }
}
