<?php
return [
    'id' => 3,
    'type' => 4,
    'folder' => 'text_page',
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
                'type' => 'text',
                'error_msg' => 'title_is_required',
                'required' => 'required',
                'max' => '100',
                'min' => '3',

            ],
			'text' => [
                'type' => 'textarea',
                'max' => '2000',
                'min' => '3',
                'validation' => 'min:3|max:20'
            ],
            'Mission' => [
                'type' => 'text',
            
            ],
            'Vission' => [
                'type' => 'text',
            
            ],
            'History' => [
                'type' => 'text',
            
            ],
           
            'active' => [
                'type' => 'checkbox',
            ],
        ],
        'nonTrans' => [
            // 'date' => [
            //     'type' => 'date',
            //     'required' => 'required',
            //     'validation' => 'required|max:20'
            // ],
			'images' => [
                'type' => 'images',

            ],
        ],
    ]
];
