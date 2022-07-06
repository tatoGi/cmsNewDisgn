<?php
return [
    'id' => 2,
    'type' => 2,
    'folder' => 'news',
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
                'type' => 'text',
                'error_msg' => 'title_is_required',
                'required' => 'required',
                'max' => '100',
                'min' => '3',

            ],
            // 'tag' => [
            //     'type' => 'text',
            //     'error_msg' => 'title_is_required',
            //     'required' => 'required',
            //     'max' => '100',
            //     'min' => '3',

            // ],
			'text' => [
                'type' => 'textarea',

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
            'linkedin' => [
                'type' => 'text',
            ],
            'instagram' => [
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
