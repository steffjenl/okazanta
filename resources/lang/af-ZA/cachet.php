<?php

/*
 * This file is part of Okazanta.
 *
 * (c) Alt Three Services Limited
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

return [
    // Components
    'components' => [
        'last_updated' => 'Last updated :timestamp',
        'status'       => [
            0 => 'Unknown',
            1 => 'Operasioneel',
            2 => 'Prestasieprobleme',
            3 => 'Gedeeltelike Onderbreking',
            4 => 'Groot Onderbreking',
        ],
        'group' => [
            'other' => 'Other Components',
        ],
        'select_all'   => 'Select All',
        'deselect_all' => 'Deselect All',
    ],

    // Incidents
    'incidents' => [
        'none'         => 'No incidents reported',
        'past'         => 'Past Incidents',
        'stickied'     => 'Stickied Incidents',
        'scheduled'    => 'Maintenance',
        'scheduled_at' => ', scheduled :timestamp',
        'posted'       => 'Posted :timestamp by :username',
        'posted_at'    => 'Posted at :timestamp',
        'status'       => [
            1 => 'Investigating',
            2 => 'Identified',
            3 => 'Hou Dop',
            4 => 'Opgelos',
        ],
    ],

    // Schedule
    'schedules' => [
        'status' => [
            0 => 'Upcoming',
            1 => 'In Progress',
            2 => 'Complete',
        ],
    ],

    // Service Status
    'service' => [
        'good'  => '[0,1]System operational|[2,*]All systems are operational',
        'bad'   => '[0,1]The system is experiencing issues|[2,*]Some systems are experiencing issues',
        'major' => '[0,1]The system is experiencing major issues|[2,*]Some systems are experiencing major issues',
    ],

    'api' => [
        'regenerate' => 'Regenerate API Key',
        'revoke'     => 'Revoke API Key',
    ],

    // Metrics
    'metrics' => [
        'filter' => [
            'last_hour' => 'Last Hour',
            'hourly'    => 'Afgelope 12 Uur',
            'weekly'    => 'Weekliks',
            'monthly'   => 'Maandeliks',
        ],
    ],

    // Subscriber
    'subscriber' => [
        'subscribe'           => 'Subscribe to status changes and incident updates',
        'unsubscribe'         => 'Unsubscribe',
        'button'              => 'Teken aan',
        'manage_subscription' => 'Manage subscription',
        'manage'              => [
            'notifications'       => 'Notifications',
            'notifications_for'   => 'Manage notifications for',
            'no_subscriptions'    => 'You\'re currently subscribed to all updates.',
            'update_subscription' => 'Update Subscription',
            'my_subscriptions'    => 'You\'re currently subscribed to the following updates.',
            'manage_at_link'      => 'Manage your subscriptions at :link',
        ],
        'email' => [
            'manage_subscription' => 'We\'ve sent you an email, please click the link to manage your subscription',
            'subscribe'           => 'Subscribe to email updates.',
            'subscribed'          => 'You\'ve been subscribed to email notifications, please check your email to confirm your subscription.',
            'updated-subscribe'   => 'You\'ve succesfully updated your subscriptions.',
            'verified'            => 'Your email subscription has been confirmed. Thank you!',
            'manage'              => 'Bestuur Subskripsies',
            'unsubscribe'         => 'Unsubscribe from email updates.',
            'unsubscribed'        => 'Your email subscription has been cancelled.',
            'failure'             => 'Something went wrong with the subscription.',
            'already-subscribed'  => 'Cannot subscribe :email because they\'re already subscribed.',
        ],
    ],

    'signup' => [
        'title'    => 'Teken Aan',
        'username' => 'Username',
        'email'    => 'EPos',
        'password' => 'Wagwoord',
        'success'  => 'U rekening is geskep.',
        'failure'  => 'Something went wrong with the signup.',
    ],

    'system' => [
        'update' => 'There is a newer version of Okazanta available. You can learn how to update <a href="https://docs.Okazantahq.io/docs/updating-Okazanta">here</a>!',
    ],

    // Modal
    'modal' => [
        'close'     => 'Maak toe',
        'subscribe' => [
            'title'  => 'Subscribe to component updates',
            'body'   => 'Enter your email address to subscribe to updates for this component. If you\'re already subscribed, you\'ll already receive emails for this component.',
            'button' => 'Teken aan',
        ],
    ],

    // Meta descriptions
    'meta' => [
        'description' => [
            'incident'  => 'Details and updates about the :name incident that occurred on :date',
            'schedule'  => 'Details about the scheduled maintenance period :name starting :startDate',
            'subscribe' => 'Subscribe to :app in order to receive updates of incidents and scheduled maintenance periods',
            'overview'  => 'Stay up to date with the latest service updates from :app.',
        ],
    ],

    // Other
    'home'            => 'Tuiste',
    'powered_by'      => 'Powered by <a href="https://okazanta.com" class="links">Okazanta</a>.',
    'timezone'        => 'Times are shown in :timezone.',
    'about_this_site' => 'Aangaande Hierdie Webwerf',
    'rss-feed'        => 'RSS',
    'atom-feed'       => 'Atom',
    'feed'            => 'Status Feed',

];
