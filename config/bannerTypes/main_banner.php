<?php
return [
    'id' => 1,
    'type' => 1,
    'name' => 'main_banner',
    'fields' => [
        'trans' => [
           
            'slug' => [
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
            'date' => [
                'type' => 'date',
                'required' => 'required',
                'validation' => 'required|max:20',
                'placeholder' => 'sdf'
            ],
        ]



    ]

];
