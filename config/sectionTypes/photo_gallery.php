<?php
return [
    'id' => 10,
    'type' => 10,
    'folder' => 'photo',
	'paginate' => 16,
    'fields' => [
        'trans' => [
            'title' => [
                'type' => 'text',
                'error_msg' => 'title_is_required',
                'required' => 'required',
                'max' => '10000',
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
            'active' => [
                'type' => 'checkbox',
            ],

        ],
        'nonTrans' => [
            'images' => [
                'type' => 'images',

            ],

            'date' => [
                'type' => 'date',
                'required' => 'required',
                'validation' => 'required|max:20'
            ],



        ],




    ]

];
