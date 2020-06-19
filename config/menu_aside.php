<?php
// Aside menu
return [

    'items' => [
        // Dashboard


        // Custom
        [
            'section' => 'Enquiry',
        ],
        [
            'title' => 'Enquiry List',
            'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
            'page' => 'enquiry',
            'bullet' => 'line'

        ],
        [
            'title' => 'Quotations',
            'icon' => 'media/svg/icons/Shopping/Barcode-read.svg',
            'page' => 'quotation',
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
            'page' => 'payment',
            'bullet' => 'dot'
        ]
    ]

];
