<?php

/*
 * This file is part of Cachet.
 *
 * (c) Alt Three Services Limited
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CachetHQ\Cachet\Presenters;

use CachetHQ\Cachet\Models\Incident;
use CachetHQ\Cachet\Presenters\Traits\TimestampsTrait;
use CachetHQ\Cachet\Services\Dates\DateFactory;
use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Contracts\Support\Arrayable;
use McCool\LaravelAutoPresenter\BasePresenter;

class MonitorPresenter extends BasePresenter implements Arrayable
{
    use TimestampsTrait;

    /**
     * The date factory instance.
     *
     * @var \CachetHQ\Cachet\Services\Dates\DateFactory
     */
    protected $dates;

    /**
     * Flag for the latest function.
     *
     * @var bool
     */
    protected $latest = false;

    /**
     * Incident icon lookup.
     *
     * @var array
     */
    protected $icons = [
        0 => 'icon ion-android-calendar', // Scheduled
        1 => 'icon ion-flag oranges', // Investigating
        2 => 'icon ion-alert yellows', // Identified
        3 => 'icon ion-eye blues', // Watching
        4 => 'icon ion-checkmark greens', // Fixed
    ];

    /**
     * Create a new presenter.
     *
     * @param \CachetHQ\Cachet\Services\Dates\DateFactory $dates
     * @param \CachetHQ\Cachet\Models\Incident            $resource
     *
     * @return void
     */
    public function __construct(DateFactory $dates, Incident $resource)
    {
        $this->dates = $dates;
    }

    /**
     * Renders the message from Markdown into HTML.
     *
     * @return string
     */
    public function formatted_message()
    {
        return Markdown::convertToHtml($this->wrappedObject->message);
    }

    /**
     * Return the raw text of the message, even without Markdown.
     *
     * @return string
     */
    public function raw_message()
    {
        return strip_tags($this->formatted_message());
    }

    /**
     * Present formatted occurred_at date time.
     *
     * @return string
     */
    public function occurred_at()
    {
        return $this->dates->make($this->wrappedObject->occurred_at)->toDateTimeString();
    }

    /**
     * Present diff for humans date time.
     *
     * @return string
     */
    public function occurred_at_diff()
    {
        return $this->dates->make($this->wrappedObject->occurred_at)->diffForHumans();
    }

    /**
     * Present formatted date time.
     *
     * @return string
     */
    public function occurred_at_formatted()
    {
        return ucfirst($this->dates->make($this->wrappedObject->occurred_at)->format($this->incidentDateFormat()));
    }

    /**
     * Formats the occurred_at time ready to be used by bootstrap-datetimepicker.
     *
     * @return string
     */
    public function occurred_at_datetimepicker()
    {
        return $this->dates->make($this->wrappedObject->occurred_at)->format('Y-m-d H:i');
    }

    /**
     * Present formatted date time.
     *
     * @return string
     */
    public function occurred_at_iso()
    {
        return $this->dates->make($this->wrappedObject->occurred_at)->toISO8601String();
    }

    /**
     * Present diff for humans date time.
     *
     * @return string
     */
    public function created_at_diff()
    {
        return $this->dates->make($this->wrappedObject->created_at)->diffForHumans();
    }

    /**
     * Present formatted date time.
     *
     * @return string
     */
    public function created_at_formatted()
    {
        return ucfirst($this->dates->make($this->wrappedObject->created_at)->format($this->incidentDateFormat()));
    }

    /**
     * Present formatted date time.
     *
     * @return string
     */
    public function created_at_iso()
    {
        return $this->dates->make($this->wrappedObject->created_at)->toISO8601String();
    }

    /**
     * Returns a formatted timestamp for use within the timeline.
     *
     * @return string
     */
    public function timestamp_formatted()
    {
        return $this->occurred_at_formatted;
    }

    /**
     * Return the iso timestamp for use within the timeline.
     *
     * @return string
     */
    public function timestamp_iso()
    {
        return $this->occurred_at_iso;
    }

    /**
     * Present the status with an icon.
     *
     * @return string
     */
    public function icon()
    {
        if (isset($this->icons[$this->wrappedObject->is_down])) {
            return $this->icons[$this->wrappedObject->is_down];
        }
    }

    /**
     * Get the incident permalink.
     *
     * @return string
     */
    public function permalink()
    {
        return cachet_route('monitor', [$this->wrappedObject->id]);
    }

    /**
     * Convert the presenter instance to an array.
     *
     * @return string[]
     */
    public function toArray()
    {
        return array_merge($this->wrappedObject->toArray(), [
            'created_at'        => $this->created_at(),
            'updated_at'        => $this->updated_at(),
            'default_view_name' => $this->default_view_name(),
        ]);
    }

    /**
     * Convert the object to its JSON representation.
     *
     * @param int $options
     *
     * @return string
     */
    public function toJson($options = 0)
    {
        $json = json_encode($this->toArray(), $options);

        return $json;
    }
}
