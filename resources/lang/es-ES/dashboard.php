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

    'dashboard'          => 'Panel de Control',
    'writeable_settings' => 'The Okazanta settings directory is not writeable. Please make sure that <code>./bootstrap/Okazanta</code> is writeable by the web server.',

    // Incidents
    'incidents' => [
        'title'                    => 'Incidents & Maintenance',
        'incidents'                => 'Incidentes',
        'logged'                   => '{0}There are no incidents, good work.|[1]You have logged one incident.|[2,*]You have reported <strong>:count</strong> incidents.',
        'incident-create-template' => 'Crear plantilla',
        'incident-templates'       => 'Plantillas de incidente',
        'updates'                  => [
            'title'   => 'Incident updates for :incident',
            'count'   => '{0}Zero Updates|[1]One Update|[2]Two Updates|[3,*]Several Updates',
            'add'     => [
                'title'   => 'Create new incident update',
                'success' => 'Your new incident update has been created.',
                'failure' => 'Something went wrong with the incident update.',
            ],
            'edit' => [
                'title'   => 'Edit incident update',
                'success' => 'The incident update has been updated.',
                'failure' => 'Something went wrong updating the incident update',
            ],
        ],
        'reported_by'              => 'Reported :timestamp by :user',
        'add'                      => [
            'title'   => 'Reportar incidente',
            'success' => 'Incidente agregado.',
            'failure' => 'Hubo un error agregando el incidente, por favor intente de nuevo.',
        ],
        'edit' => [
            'title'   => 'Editar un incidente',
            'success' => 'Incidente actualizado.',
            'failure' => 'Hubo un error editando el incidente, por favor intente de nuevo.',
        ],
        'delete' => [
            'success' => 'El incidente se ha eliminado y no se mostrará en tu página de estado.',
            'failure' => 'El incidente no se pudo eliminar, por favor intente de nuevo.',
        ],

        // Incident templates
        'templates' => [
            'title' => 'Plantillas de incidente',
            'add'   => [
                'title'   => 'Crear una plantilla de incidente',
                'message' => 'Create your first incident template.',
                'success' => 'Su nueva plantilla de incidentes ha sido creada.',
                'failure' => 'Algo salió mal con la plantilla de incidente.',
            ],
            'edit' => [
                'title'   => 'Editar plantilla',
                'success' => 'La plantilla de incidente ha sido actualizada.',
                'failure' => 'Algo salió mal actualizando la plantilla de incidente',
            ],
            'delete' => [
                'success' => 'La plantilla de incidente se ha eliminado.',
                'failure' => 'La plantilla de incidente no se pudo eliminar. Por favor, inténtalo de nuevo.',
            ],
        ],
    ],

    // Incident Maintenance
    'schedule' => [
        'schedule'     => 'Maintenance',
        'logged'       => '{0}There has been no Maintenance, good work.|[1]You have logged one schedule.|[2,*]You have reported <strong>:count</strong> schedules.',
        'scheduled_at' => 'Programado para :timestamp',
        'add'          => [
            'title'   => 'Add Maintenance',
            'success' => 'Maintenance added.',
            'failure' => 'Something went wrong adding the Maintenance, please try again.',
        ],
        'edit' => [
            'title'   => 'Edit Maintenance',
            'success' => 'Maintenance has been updated!',
            'failure' => 'Something went wrong editing the Maintenance, please try again.',
        ],
        'delete' => [
            'success' => 'The Maintenance has been deleted and will not show on your status page.',
            'failure' => 'The Maintenance could not be deleted, please try again.',
        ],
    ],

    // Components
    'components' => [
        'components'         => 'Componentes',
        'component_statuses' => 'Estatus de los componentes',
        'listed_group'       => 'Agrupado bajo :nombre',
        'add'                => [
            'title'   => 'Agregar componente',
            'message' => 'Deberías agregar un componente.',
            'success' => 'Componente creado.',
            'failure' => 'Algo salió mal con el componente, por favor intente de nuevo.',
        ],
        'edit' => [
            'title'   => 'Editar componente',
            'success' => 'Componente actualizado.',
            'failure' => 'Algo salió mal con el componente, por favor intente de nuevo.',
        ],
        'delete' => [
            'success' => 'El componente se ha eliminado!',
            'failure' => 'El componente no pudo ser eliminado, por favor, inténtelo de nuevo.',
        ],

        // Component groups
        'groups' => [
            'groups'        => 'Grupo de componente|Grupos de componente',
            'no_components' => 'Usted debería agregar un grupo de componentes.',
            'add'           => [
                'title'   => 'Agregar un grupo de componentes',
                'success' => 'Grupo de componentes agregado.',
                'failure' => 'Algo salió mal con el componente, por favor intente de nuevo.',
            ],
            'edit' => [
                'title'   => 'Editar un grupo de componentes',
                'success' => 'Grupo de componentes actualizado.',
                'failure' => 'Algo salió mal con el componente, por favor intente de nuevo.',
            ],
            'delete' => [
                'success' => 'El grupo de componentes se ha eliminado!',
                'failure' => 'El grupo de componentes no pudo ser eliminado, por favor, inténtelo de nuevo.',
            ],
        ],
    ],

    // Metrics
    'metrics' => [
        'metrics' => 'Métricas',
        'add'     => [
            'title'   => 'Crear una métrica o indicador',
            'message' => 'Deberías añadir una métrica.',
            'success' => 'Métrica creada.',
            'failure' => 'Algo salió mal con la métrica, por favor, inténtelo de nuevo.',
        ],
        'edit' => [
            'title'   => 'Editar una métrica',
            'success' => 'Métrica actualizada.',
            'failure' => 'Algo salió mal con la métrica, por favor, inténtelo de nuevo.',
        ],
        'delete' => [
            'success' => 'La métrica se ha eliminado y no se mostrará más en tu página de estado.',
            'failure' => 'La métrica no pudo ser eliminada, por favor, inténtelo de nuevo.',
        ],
    ],
    // Subscribers
    'subscribers' => [
        'subscribers'          => 'Suscriptores',
        'description'          => 'Los suscriptores recibirán actualizaciones por correo electrónico cuando se creen incidentes o se actualicen componentes.',
        'description_disabled' => 'To use this feature, you need allow people to signup for notifications.',
        'verified'             => 'Verificado',
        'not_verified'         => 'No confirmado',
        'subscriber'           => ':email, suscrito :date',
        'no_subscriptions'     => 'Suscrito a todas las actualizaciones',
        'global'               => 'Globally subscribed',
        'add'                  => [
            'title'   => 'Agregar un nuevo subscriptor',
            'success' => 'Subscriptor agregado.',
            'failure' => 'Algo salió mal al agregar el suscriptor, por favor, inténtelo de nuevo.',
            'help'    => 'Agregue cada subscriptor en una línea nueva.',
        ],
        'edit' => [
            'title'   => 'Actualizar subscriptor',
            'success' => 'Subscriptor actualizado.',
            'failure' => 'Algo salió mal al editar el suscriptor, por favor, inténtelo de nuevo.',
        ],
    ],

    // Team
    'team' => [
        'team'        => 'Equipo',
        'member'      => 'Miembro',
        'profile'     => 'Perfil',
        'description' => 'Los miembros del equipo será capaces de añadir, modificar y editar componentes e incidentes.',
        'add'         => [
            'title'   => 'Añadir a un nuevo miembro de equipo',
            'success' => 'Miembro del equipo agregado.',
            'failure' => 'No se pudo agregar el miembro del equipo, por favor vuelva a intentarlo.',
        ],
        'edit' => [
            'title'   => 'Actualizar perfil',
            'success' => 'Perfil actualizado.',
            'failure' => 'Algo salió mal actualizando el perfil, por favor intente de nuevo.',
        ],
        'delete' => [
            'success' => 'El miembro del equipo ha sido eliminado y ya no tendrán acceso al Pane de Control!',
            'failure' => 'No se pudo agregar el miembro del equipo, por favor vuelva a intentarlo.',
        ],
        'invite' => [
            'title'   => 'Invitar a un nuevo miembro al equipo',
            'success' => 'Se ha enviado una invitación',
            'failure' => 'La invitación no pudo ser enviada, por favor intente de nuevo.',
        ],
    ],

    // Settings
    'settings' => [
        'settings'  => 'Ajustes',
        'app-setup' => [
            'app-setup'   => 'Configuración de aplicación',
            'images-only' => 'Sólo puedes subir imágenes.',
            'too-big'     => 'El archivo subido es demasiado grande. Sube una imagen con tamaño menor a: tamaño',
        ],
        'analytics' => [
            'analytics' => 'Analytics',
        ],
        'log' => [
            'log' => 'Log',
        ],
        'localization' => [
            'localization' => 'Localización',
        ],
        'customization' => [
            'customization' => 'Personalización',
            'header'        => 'Cabecera HTML personalizada',
            'footer'        => 'Pie HTML personalizado',
        ],
        'mail' => [
            'mail'  => 'Mail',
            'test'  => 'Test',
            'email' => [
                'subject' => 'Test notification from Okazanta',
                'body'    => 'This is a test notification from Okazanta.',
            ],
        ],
        'security' => [
            'security'   => 'Seguridad',
            'two-factor' => 'Usuarios sin autenticación de dos factores',
        ],
        'stylesheet' => [
            'stylesheet' => 'Hoja de estilo',
        ],
        'theme' => [
            'theme' => 'Tema',
        ],
        'edit' => [
            'success' => 'Configuración guardada.',
            'failure' => 'La configuración no se podido guardar.',
        ],
        'credits' => [
            'credits'       => 'Créditos',
            'contributors'  => 'Colaboradores',
            'license'       => 'Okazanta es un proyecto de código libre bajo la licencia BSD-3, liberado por <a href="https://alt-three.com/?utm_source=Okazanta&utm_medium=credits&utm_campaign=Okazanta%20Credit%20Dashboard" target="_blank">Alt Three Services Limited</a>.',
            'backers-title' => 'Patrocinadores',
            'backers'       => 'Si desea apoyar futuros desarrollos, ingrese a la campaña de <a href="https://www.paypal.com/paypalme/steffjenl" target="_blank">Okazanta PayPal</a>.',
            'thank-you'     => 'Gracias a todos y cada uno de los :count colaboradores.',
        ],
    ],

    // Login
    'login' => [
        'login'      => 'Iniciar Sesión',
        'logged_in'  => 'Estás conectado.',
        'welcome'    => '¡Bienvenido!',
        'two-factor' => 'Por favor ingresa tu token.',
    ],

    // Sidebar footer
    'help'        => 'Ayuda',
    'status_page' => 'Página de estado',
    'logout'      => 'Salir',

    // Notifications
    'notifications' => [
        'notifications' => 'Notificaciones',
        'awesome'       => 'Excelente.',
        'whoops'        => 'Whoops.',
    ],

    // Widgets
    'widgets' => [
        'support'          => 'Apoye Okazanta',
        'support_subtitle' => '¡Visite nuestro proyecto en la página de <strong><a href="https://www.paypal.com/paypalme/steffjenl" target="_blank">PayPal</a></strong>!',
        'news'             => 'Últimas noticias',
        'news_subtitle'    => 'Obtener las actualizaciones más recientes',
    ],

    // Welcome modal
    'welcome' => [
        'welcome' => 'Bienvenido a tu página de estado!',
        'message' => 'La página de estado está casi lista! Tal vez quieras configurar estos ajustes adicionales',
        'close'   => 'Llévame directamente a mi dashboard',
        'steps'   => [
            'component'  => 'Crear componentes',
            'incident'   => 'Crear incidentes',
            'customize'  => 'Personalizar',
            'team'       => 'Agregar Usuarios',
            'api'        => 'Generar token API',
            'two-factor' => 'Autenticación de dos factores',
        ],
    ],

];
