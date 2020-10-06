<?php
// Aside menu
return [

    'items' => [
        // Dashboard
        [
            
            'title' => 'Dashboard',
            'root' => true,
            'icon' => 'media/svg/icons/Design/Layers.svg', // or can be 'flaticon-home' or any flaticon-*
            'page' => '/',
            'new-tab' => false,

        ],

        // Custom
        [
            'section' => 'Custom',
        ],
        [
            'title' => 'User & Phone Line Information',
            'root' => true,
            'icon' => 'media/svg/icons/Home/Library.svg',
            'page' => '/data_user',
            'visible' => 'preview',
        ],
        [
            'title' => 'Role Permissions',
            'root' => true,
            'icon' => 'media/svg/icons/Home/Library.svg',
            'page' => '/role',
            'visible' => 'preview',
            'roles' => ['admin'],

        ],  
        [
            'title' => 'send mail',
            'root' => true,
            'icon' => 'media/svg/icons/Home/Library.svg',
            'page' => 'sendemail',
            'visible' => 'preview',
        ],      
        // Layout
        [
            'section' => 'Layout',
        ],
        [
            'title' => 'SPT Request',
            'root' => true,
            'icon' => 'media/svg/icons/Home/Library.svg',
            'page' => 'spt_request',
            'visible' => 'preview',
        ],
        [
            'title' => 'FBO Request',
            'root' => true,
            'icon' => 'media/svg/icons/Home/Library.svg',
            'page' => 'builder',
            'visible' => 'preview',
        ],
        [
            'title' => 'Helpdesk Request',
            'root' => true,
            'icon' => 'media/svg/icons/Home/Library.svg',
            'page' => '/helpdesk',
            'visible' => 'preview',
        ],
        [
            'title' => 'E learning Registration ',
            'root' => true,
            'icon' => 'media/svg/icons/Home/Library.svg',
            'page' => '/elearn',
            'visible' => 'preview',
        ],
        [
            'title' => 'Meeting Room Request',
            'root' => true,
            'icon' => 'media/svg/icons/Home/Library.svg',
            'page' => 'builder',
            'visible' => 'preview',
        ], [
            'title' => 'Document Approval Request',
            'root' => true,
            'icon' => 'media/svg/icons/Home/Library.svg',
            'page' => 'builder',
            'visible' => 'preview',
        ], [
            'title' => 'Trip Request',
            'root' => true,
            'icon' => 'media/svg/icons/Home/Library.svg',
            'page' => 'builder',
            'visible' => 'preview',
        ], [
            'title' => 'Car Request',
            'root' => true,
            'icon' => 'media/svg/icons/Home/Library.svg',
            'page' => 'builder',
            'visible' => 'preview',
        ], [
            'title' => 'Taxi Request',
            'root' => true,
            'icon' => 'media/svg/icons/Home/Library.svg',
            'page' => 'builder',
            'visible' => 'preview',
        ], [
            'title' => 'General Request',
            'root' => true,
            'icon' => 'media/svg/icons/Home/Library.svg',
            'page' => 'builder',
            'visible' => 'preview',
        ], [
            'title' => 'Shipment Request',
            'root' => true,
            'icon' => 'media/svg/icons/Home/Library.svg',
            'page' => 'builder',
            'visible' => 'preview',
        ], [
            'title' => 'Fingerprint Data',
            'root' => true,
            'icon' => 'media/svg/icons/Home/Library.svg',
            'page' => 'builder',
            'visible' => 'preview',
        ], [
            'title' => 'Corporate Rate Hotel',
            'root' => true,
            'icon' => 'media/svg/icons/Home/Library.svg',
            'page' => 'builder',
            'visible' => 'preview',
        ], [
            'title' => 'PSD Service Request',
            'root' => true,
            'icon' => 'media/svg/icons/Home/Library.svg',
            'page' => 'builder',
            'visible' => 'preview',
        ], [
            'title' => 'HSE Reporting',
            'root' => true,
            'icon' => 'media/svg/icons/Home/Library.svg',
            'page' => 'builder',
            'visible' => 'preview',
        ], [
            'title' => 'AI-PSG SOP',
            'root' => true,
            'icon' => 'media/svg/icons/Home/Library.svg',
            'page' => 'builder',
            'visible' => 'preview',
        ], 
        [
            'section' => 'SIT DIVISION',
        ],
        [
            'title' => 'SIT SOP',
            'root' => true,
            'icon' => 'media/svg/icons/Home/Library.svg',
            'page' => 'builder',
            'visible' => 'preview',
        ], [
            'title' => 'SIT HELPDESK',
            'root' => true,
            'icon' => 'media/svg/icons/Home/Library.svg',
            'page' => 'builder',
            'visible' => 'preview',
        ], [
            'title' => 'QHSE E-NCR',
            'root' => true,
            'icon' => 'media/svg/icons/Home/Library.svg',
            'page' => 'builder',
            'visible' => 'preview',
        ],  
      
        [
            'section' => 'Layout',
        ],
    ]

];
