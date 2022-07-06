<?php
return [
    'id' => 8,
    'type' => 8,
    'folder' => 'team',
	'paginate' => 16,
    'fields' => [
        'trans' => [
            'title' => [
                'type' => 'text',
            ],
            'slug' => [
                'type' => 'text',
                'error_msg' => 'slug_is_required',
                'required' => 'required',
                'max' => '100',
                'min' => '3',

            ],


			'text' => [
                'type' => 'textarea',
            ],
            'position' => [
                'type' => 'text',
            ],
            'active' => [
                'type' => 'checkbox',
            ],
        ],

        'nonTrans' => [
            'images' => [
                'type' => 'images',

            ],

            'facebook' => [
                'type' => 'text',
            ],
            'Linkedin' => [
                'type' => 'text',
            ],
            'instagram' => [
                'type' => 'text',
            ],
            'mail' => [
                'type' => 'text',
            ],
            'date' => [
                'type' => 'date',
                'required' => 'required',
                'validation' => 'required|max:20'
            ],

        ],




    ]

];
