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
            'section' => 'Enquiry',
        ],
        [
            'title' => 'Enquiry List',
            'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
            'bullet' => 'line'

        ],
        [
            'title' => 'Quotations',
            'icon' => 'media/svg/icons/Shopping/Barcode-read.svg',
            'bullet' => 'dot'
        ],

        // Layout
        [
            'section' => 'Payment',
        ],
        [
            'title' => 'Payment Details',
            'desc' => '',
            'icon' => 'media/svg/icons/Design/Bucket.svg',
            'bullet' => 'dot'
        ],
        [
            'section' => 'Trucks',
        ],
        [
            'title' => 'My Trucks',
            'desc' => '',
            'icon' => 'media/svg/icons/Design/Bucket.svg',
            'bullet' => 'dot'
        ]
    ]

];
