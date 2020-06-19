<?php
// Aside menu
return [

    'items' => [
        // Dashboard
/*        [
            'title' => 'Dashboard',
            'root' => true,
            'icon' => 'media/svg/icons/Design/Layers.svg', // or can be 'flaticon-home' or any flaticon-*
            'page' => '/',
            'new-tab' => false,
        ],*/

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
        ],
        [
            'section' => 'Trucks',
        ],
        [
            'title' => 'Owner Trucks',
            'desc' => '',
            'icon' => 'media/svg/icons/Design/Bucket.svg',
            'bullet' => 'dot'
        ],
        [
            'section' => 'Settings',
        ],
        [
            'title' => 'Website Config',
            'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
            'bullet' => 'line',
            'root' => true,
            'submenu' => [
                [
                    'title' => 'Categories',
                    'bullet' => 'dot',
                    'submenu' => [
                        [
                            'title' => 'List',
                            'page' => 'categories',
                        ],
                        [
                            'title' => 'Add New',
                            'page' => 'categories/create'
                        ]
                    ]
                ],
                [
                    'title' => 'Attribute',
                    'bullet' => 'dot',
                    'submenu' => [
                        [
                            'title' => 'List',
                            'page' => 'attribute',
                        ],
                        [
                            'title' => 'Add New',
                            'page' => 'attribute/create'
                        ]
                    ]
                ],
/*                [
                    'title' => 'Goods Type',
                    'bullet' => 'dot',
                    'submenu' => [
                        [
                            'title' => 'List',
                            'page' => 'attribute',
                        ],
                        [
                            'title' => 'Add New',
                            'page' => 'attribute/create'
                        ]
                    ]
                ],*/
                [
                    'title' => 'Truck Type',
                    'bullet' => 'dot',
                    'submenu' => [
                        [
                            'title' => 'List',
                            'page' => 'product',
                        ],
                        [
                            'title' => 'Add New',
                            'page' => 'product/create'
                        ]
                    ]
                ]
             ]

        ]

    ]

];
