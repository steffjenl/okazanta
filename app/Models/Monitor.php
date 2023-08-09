<?php

/*
 * This file is part of Cachet.
 *
 * (c) Alt Three Services Limited
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CachetHQ\Cachet\Models;

use AltThree\Validator\ValidatingTrait;
use AltThree\Validator\ValidationException;
use CachetHQ\Cachet\Models\Traits\HasMeta;
use CachetHQ\Cachet\Models\Traits\SortableTrait;
use CachetHQ\Cachet\Presenters\MonitorPresenter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\MessageBag;
use McCool\LaravelAutoPresenter\HasPresenter;

class Monitor extends Model implements HasPresenter
{
    use HasMeta;
    use SortableTrait;
    use ValidatingTrait;
    use HasUuids;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'uuid';

    /**
     * The model's attributes.
     *
     * @var string[]
     */
    protected $attributes = [
        'name'          => '',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var string[]
     */
    protected $casts = [
        'name'          => 'string',
    ];

    /**
     * The fillable properties.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
    ];

    /**
     * The validation rules.
     *
     * @var string[]
     */
    public $rules = [
        'name'          => 'required',
    ];

    /**
     * The sortable fields.
     *
     * @var string[]
     */
    protected $sortable = [
        'uuid',
        'name',
    ];

    /**
     * Overrides the models boot method.
     *
     * @return void
     */
    public static function boot()
    {
        parent::boot();

        // When deleting a monitor, delete the logs too.
        self::deleting(function ($model) {
            $model->logs()->delete();
        });
    }

    /**
     * Get the points relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function logs()
    {
        return $this->hasMany(MonitorLog::class, 'monitor_id', 'uuid')->latest();
    }

    /**
     * Validate the model before save.
     *
     * @throws \AltThree\Validator\ValidationException
     *
     * @return void
     */
    public function validate()
    {
        $messages = [];

//        if (60 % $this->threshold !== 0) {
//            $messages[] = 'Threshold must divide by 60.';
//        }

        if ($messages) {
            throw new ValidationException(new MessageBag($messages));
        }
    }

    /**
     * Get the presenter class.
     *
     * @return string
     */
    public function getPresenterClass()
    {
        return MonitorPresenter::class;
    }
}
