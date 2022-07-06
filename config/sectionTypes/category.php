<?php
return [
    'id' => 13,
    'type' => 13,
    'folder' => 'categories',
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
           
            'active' => [
                'type' => 'checkbox',
            ],
        ],

        'nonTrans' => [
            'category' => [
                'type' => 'category',

            ],
            'images' => [
                'type' => 'images',
            ],
            
           
            

        ],
    ]
];
