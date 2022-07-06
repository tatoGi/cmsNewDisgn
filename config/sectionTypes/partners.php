<?php
return [
    'id' => 7,
    'type' => 7,
    'folder' => 'partners',
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
         
            'active' => [
                'type' => 'checkbox',
            ],
        ],
        'nonTrans' => [
            'logo' => [
                'type' => 'logo',
            ],
            'website' => [
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
