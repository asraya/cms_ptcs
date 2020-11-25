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
        [
            'title' => 'User & Phone Line Information',
            'root' => true,
            'icon' => 'media/svg/icons/Home/Library.svg',
            'page' => '/users',
            'visible' => 'preview',
        ],
        // Custom
        // [
        //     'section' => 'Custom',
        // ],
       
        // [
        //     'title' => 'Role Permissions',
        //     'root' => true,
        //     'icon' => 'media/svg/icons/Home/Library.svg',
        //     'page' => '/roles',
        //     'visible' => 'preview',
        // ],  
        // [
        //     'title' => 'send mail',
        //     'root' => true,
        //     'icon' => 'media/svg/icons/Home/Library.svg',
        //     'page' => 'sendemail',
        //     'visible' => 'preview',
        // ],      
        // Layout
        [
            'section' => 'CONTENT',
        ],
        [
            'title' => 'List IT Stock',
            'root' => true,
            'icon' => 'media/svg/icons/Home/Library.svg',
            'page' => 'listitstock',
            'visible' => 'preview',
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
            'page' => 'fbo',
            'visible' => 'preview',
        ],
        [
            'title' => 'Helpdesk Request',
            'root' => true,
            'icon' => 'media/svg/icons/Home/Library.svg',
            'page' => 'it_helpdesk',
            'visible' => 'preview',
        ],
        // [
        //     'title' => 'Helpdesk Request',
        //     'bullet' => 'dot',
        //     'icon' => 'media/svg/icons/Home/Library.svg',
        //     'root' => true,
        //     'submenu' => [
        //         [
        //             'title' => 'IT Helpdesk',
        //             'page' => '/it_helpdesk',
        //         ],
        //         [
        //             'title' => 'GA Helpdesk',
        //             'page' => '/ga_helpdesk'
        //         ],    
                
        //     ]
        // ],
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
            'page' => 'meeting_room',
            'visible' => 'preview',
        ], 
        [
            'title' => 'Document Approval Request',
            'root' => true,
            'icon' => 'media/svg/icons/Home/Library.svg',
            'page' => 'docapprove',
            'visible' => 'preview',
        ], 
        [
            'title' => 'Trip Request',
            'root' => true,
            'icon' => 'media/svg/icons/Home/Library.svg',
            'page' => 'trip_request',
            'visible' => 'preview',
        ], 
        [
            'title' => 'Car Request',
            'root' => true,
            'icon' => 'media/svg/icons/Home/Library.svg',
            'page' => 'car_request',
            'visible' => 'preview',
        ], 
        [
            'title' => 'Taxi Request',
            'root' => true,
            'icon' => 'media/svg/icons/Home/Library.svg',
            'page' => 'taxi_request',
            'visible' => 'preview',
        ], 
        // [
        //     'title' => 'General Request',
        //     'root' => true,
        //     'icon' => 'media/svg/icons/Home/Library.svg',
        //     'page' => 'general_request',
        //     'visible' => 'preview',
        // ],
        [
            'title' => 'General Request',
            'root' => true,
            'icon' => 'media/svg/icons/Home/Library.svg',
            'page' => 'general_request_server',
            'visible' => 'preview',
        ],
        // [
        //     'title' => 'General Request',
        //     'bullet' => 'dot',
        //     'icon' => 'media/svg/icons/Home/Library.svg',
        //     'root' => true,
        //     'submenu' => [
        //         [
        //             'title' => 'Stationary',
        //             'page' => '/stationary',
        //         ],
        //         [
        //             'title' => 'Souvenir',
        //             'page' => '/souvenir'
        //         ],    
                
        //     ]
        // ], 
        [
            'title' => 'Shipment Request',
            'root' => true,
            'icon' => 'media/svg/icons/Home/Library.svg',
            'page' => 'shipment',
            'visible' => 'preview',
        ], 
        [
            'title' => 'Fingerprint Data',
            'root' => true,
            'icon' => 'media/svg/icons/Home/Library.svg',
            'page' => 'finger_data',
            'visible' => 'preview',
        ], 
        [
            'title' => 'Corporate Rate Hotel',
            'root' => true,
            'icon' => 'media/svg/icons/Home/Library.svg',
            'page' => 'crh',
            'visible' => 'preview',
        ], 
        [
            'title' => 'PSD Service Request',
            'root' => true,
            'icon' => 'media/svg/icons/Home/Library.svg',
            'page' => 'psd',
            'visible' => 'preview',
        ], 
        [
            'title' => 'HSE Reporting',
            'root' => true,
            'icon' => 'media/svg/icons/Home/Library.svg',
            'page' => 'hse',
            'visible' => 'preview',
        ], 
        [
            'title' => 'AI-PSG SOP',
            'root' => true,
            'icon' => 'media/svg/icons/Home/Library.svg',
            'page' => 'ai_psg',
            'visible' => 'preview',
        ], 
        // [
        //     'section' => 'SIT DIVISION',
        // ],
        [
            'title' => 'SIT SOP',
            'root' => true,
            'icon' => 'media/svg/icons/Home/Library.svg',
            'page' => 'error',
            'visible' => 'preview',
        ], 
        [
            'title' => 'SIT HELPDESK',
            'root' => true,
            'icon' => 'media/svg/icons/Home/Library.svg',
            'page' => 'error',
            'visible' => 'preview',
        ], 
        [
            'title' => 'QHSE E-NCR',
            'root' => true,
            'icon' => 'media/svg/icons/Home/Library.svg',
            'page' => 'error',
            'visible' => 'preview',
        ],      
        // [
        //     'section' => 'Layout',
        // ],
    ]

];
