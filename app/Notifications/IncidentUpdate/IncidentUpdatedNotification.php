<?php

/*
 * This file is part of Cachet.
 *
 * (c) Alt Three Services Limited
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CachetHQ\Cachet\Notifications\IncidentUpdate;

use CachetHQ\Cachet\Models\Incident;
use CachetHQ\Cachet\Models\IncidentUpdate;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\VonageMessage;
use Illuminate\Notifications\Messages\SlackMessage;
use Illuminate\Notifications\Notification;
use McCool\LaravelAutoPresenter\Facades\AutoPresenter;
use Illuminate\Support\Facades\URL;

/**
 * This is the incident updated notification class.
 *
 * @author James Brooks <james@alt-three.com>
 */
class IncidentUpdatedNotification extends Notification
{
    use Queueable;

    /**
     * The incident update.
     *
     * @var \CachetHQ\Cachet\Models\IncidentUpdate
     */
    protected $update;

    /**
     * Create a new notification instance.
     *
     * @param \CachetHQ\Cachet\Models\IncidentUpdate $update
     *
     * @return void
     */
    public function __construct(IncidentUpdate $update)
    {
        $this->update = AutoPresenter::decorate($update);
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
        $content = trans('notifications.incident.update.mail.content', [
            'name'    => $this->update->incident->name,
            'time'    => $this->update->created_at_diff,
        ]);

        $manageUrl = URL::signedRoute(cachet_route_generator('subscribe.manage'), ['code' => $notifiable->verify_code]);

        return (new MailMessage())
            ->subject(trans('notifications.incident.update.mail.subject'))
            ->markdown('notifications.incident.update', [
                'incident'               => $this->update->incident,
                'update'                 => $this->update,
                'content'                => $content,
                'actionText'             => trans('notifications.incident.new.mail.action'),
                'actionUrl'              => cachet_route('incident', [$this->update->incident]),
                'incidentName'           => $this->update->incident->name,
                'newStatus'              => $this->update->human_status,
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
        $content = trans('notifications.incident.update.sms.content', [
            'name' => $this->update->incident->name,
        ]);

        return (new VonageMessage())->content($content);
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
        $content = trans('notifications.incident.update.slack.content', [
            'name'       => $this->update->incident->name,
            'new_status' => $this->update->human_status,
        ]);

        $status = 'info';

        if ($this->update->status === Incident::FIXED) {
            $status = 'success';
        } elseif ($this->update->status === Incident::WATCHED) {
            $status = 'warning';
        } else {
            $status = 'error';
        }

        return (new SlackMessage())
                    ->$status()
                    ->content($content)
                    ->attachment(function ($attachment) use ($notifiable) {
                        $attachment->title(trans('notifications.incident.update.slack.title', [
                            'name'       => $this->update->incident->name,
                            'new_status' => $this->update->human_status,
                        ]))
                                   ->timestamp($this->update->getWrappedObject()->created_at)
                                   ->fields(array_filter([
                                       'ID'   => "#{$this->update->id}",
                                       'Link' => $this->update->permalink,
                                   ]))
                                   ->footer(trans('cachet.subscriber.unsubscribe', ['link' => cachet_route('subscribe.unsubscribe', $notifiable->verify_code)]));
                    });
    }
}
