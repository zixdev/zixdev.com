<?php


return [
    'contact'   => [
        'notify_user'   => true,
        'notify_admin'  => true,
        'notify_admin_email'    => env('MAIL_USERNAME'),

        /*
         * Email Send From
         */
        'from' => [
            'email'  => env('MAIL_USERNAME'),
            'name' => env('MAIL_USERNAME')
        ]
    ]
];