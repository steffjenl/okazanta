<?php

/*
 * This file is part of Cachet.
 *
 * (c) Alt Three Services Limited
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CachetHQ\Cachet\Notifications\Incident;

use CachetHQ\Cachet\Models\Incident;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\VonageMessage;
use Illuminate\Notifications\Messages\SlackMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Config;
use McCool\LaravelAutoPresenter\Facades\AutoPresenter;
use Illuminate\Support\Facades\URL;

/**
 * This is the new incident notification class.
 *
 * @author James Brooks <james@alt-three.com>
 */
class NewIncidentNotification extends Notification
{
    use Queueable;

    /**
     * The incident.
     *
     * @var \CachetHQ\Cachet\Models\Incident
     */
    protected $incident;

    /**
     * Create a new notification instance.
     *
     * @param \CachetHQ\Cachet\Models\Incident $incident
     *
     * @return void
     */
    public function __construct(Incident $incident)
    {
        $this->incident = AutoPresenter::decorate($incident);
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     *
     * @return string[]
     */
    public function via($notifiable)
    {
        $via = [];
        if ($notifiable->email) {
            $via[] = 'mail';
        }
        if ($notifiable->phone_number) {
            $via[] = 'vonage';
        }
        if ($notifiable->slack_webhook_url) {
            $via[] = 'slack';
        }
        return $via;
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     *
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $content = trans('notifications.incident.new.mail.content', [
            'name' => $this->incident->name,
        ]);

        $manageUrl = URL::signedRoute(cachet_route_generator('subscribe.manage'), ['code' => $notifiable->verify_code]);

        return (new MailMessage())
                    ->subject(trans('notifications.incident.new.mail.subject'))
                    ->markdown('notifications.incident.new', [
                        'incident'               => $this->incident,
                        'content'                => $content,
                        'actionText'             => trans('notifications.incident.new.mail.action'),
                        'actionUrl'              => cachet_route('incident', [$this->incident]),
                        'unsubscribeText'        => trans('cachet.subscriber.unsubscribe'),
                        'unsubscribeUrl'         => cachet_route('subscribe.unsubscribe', $notifiable->verify_code),
                        'manageSubscriptionText' => trans('cachet.subscriber.manage_subscription'),
                        'manageSubscriptionUrl'  => $manageUrl,
                    ]);
    }

    /**
     * Get the Nexmo / SMS representation of the notification.
     *
     * @param mixed $notifiable
     *
     * @return \Illuminate\Notifications\Messages\VonageMessage
     */
    public function toVonage($notifiable)
    {
        return (new VonageMessage())->content(trans('notifications.incident.new.sms.content', [
            'name' => $this->incident->name,
        ]));
    }

    /**
     * Get the Slack representation of the notification.
     *
     * @param mixed $notifiable
     *
     * @return \Illuminate\Notifications\Messages\SlackMessage
     */
    public function toSlack($notifiable)
    {
        $content = trans('notifications.incident.new.slack.content', [
            'app_name' => Config::get('setting.app_name'),
        ]);

        $status = 'info';

        if ($this->incident->status === Incident::FIXED) {
            $status = 'success';
        } elseif ($this->incident->status === Incident::WATCHED) {
            $status = 'warning';
        } else {
            $status = 'error';
        }

        return (new SlackMessage())
                    ->$status()
                    ->content($content)
                    ->attachment(function ($attachment) {
                        $attachment->title(trans('notifications.incident.new.slack.title', ['name' => $this->incident->name]))
                                   ->timestamp($this->incident->getWrappedObject()->occurred_at)
                                   ->fields(array_filter([
                                       'ID'   => "#{$this->incident->id}",
                                       'Link' => $this->incident->permalink,
                                   ]));
                    });
    }
}
