<?php
return [
    'id' => 6,
    'type' => 6,
    'folder' => 'service',
	'paginate' => 16,
    'fields' => [
        'trans' => [
            'title' => [
                'type' => 'text',
                'error_msg' => 'title_is_required',
                'required' => 'required',
                'max' => '100',
                'min' => '3',

            ],
            'slug' => [
                'type' => 'text',
                'error_msg' => 'slug_is_required',
                'required' => 'required',
                'max' => '100',
                'min' => '3',

            ],
            'desc' => [
                'type' => 'textarea',

            ],
			'text' => [
                'type' => 'textarea',

            ],
            'keywords' => [
                'type' => 'keywords',
                'reqired' => 'required',
                'max' => '100',
                'min' => '3',
            ],
            'active' => [
                'type' => 'checkbox',
            ],
            'file' => [
                'type' => 'file',
            ]
        ],
        'nonTrans' => [
            "BookNow" => [
                "title" => "Book Now",
                "type" => "text",

            ],
            'images' => [
                'type' => 'images',

            ],
            'icon' => [
                'type'=> 'file',
            ],

            'date' => [
                'type' => 'date',
                'required' => 'required',
                'validation' => 'required|max:20'
            ],



        ],




    ]

];
