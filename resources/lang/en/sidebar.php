
<?php
return [
    'module' =>
    [
        [
            'title' => "Manage posts",
            'icon' => "fa fa-file",
            'name' => ['post'],

            'subModule' => [
                [
                    'title' => "Manage article groups",
                    'route' => "post/catalogue/index"
                ],
                [
                    'title' => "Manage posts",
                    'route' => "post/index"
                ]
            ]
        ],
        [
            'title' => "User Management",
            'icon' => "fa fa-th-large",
            'name' => ['user'],
            'subModule' => [
                [
                    'title' => "Manage group members",
                    'route' => "user/catalogue/index"
                ],
                [
                    'title' => "Membership management",
                    'route' => "user/index"
                ],
                [
                    'title' => "Permission",
                    'route' => "permission/index"
                ]
            ]
        ],

        [
            'title' => "Language management",
            'icon' => "fa fa-file",
            'name' => ['language'],

            'subModule' => [
                [
                    'title' => "Language management",
                    'route' => "language/index"
                ],

            ]
        ],
    ]
];