
<?php
return [
    'module' =>
    [
        [
            'title' => "文章管理",
            'icon' => "fa fa-file",
            'name' => ['post'],

            'subModule' => [
                [
                    'title' => "
                    管理文章组",
                    'route' => "post/catalogue/index"
                ],
                [
                    'title' => "文章管理",
                    'route' => "post/index"
                ]
            ]
        ],
        [
            'title' => "用户管理",
            'icon' => "fa fa-th-large",
            'name' => ['user'],
            'subModule' => [
                [
                    'title' => "
                    管理会员组",
                    'route' => "user/catalogue/index"
                ],
                [
                    'title' => "会员管理",
                    'route' => "user/index"
                ],
                [
                    'title' => "允许",
                    'route' => "user/index"
                ]
            ]
        ],

        [
            'title' => "语言管理",
            'icon' => "fa fa-file",
            'name' => ['language'],

            'subModule' => [
                [
                    'title' => "语言管理",
                    'route' => "language/index"
                ],

            ]
        ],
    ]
];