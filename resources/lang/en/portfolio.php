<?php

return [
    'header' => [
        'home' => 'Portfolio',
        'locale' => 'Language',
    ],
    'sidebar' => [
        'twitter' => 'Follow me on Twitter',
        'github' => 'Follow me on Github',
        'linkedin' => 'Follow me on Linkedin',
        'youtube' => 'Follow me on YouTube',
        'instagram' => 'Follow me on Instagram',
    ],
    'sections' => [
        'about' => [
            'title' => 'About me',
        ],
        'skills' => [
            'title' => 'Skills',
            'description' => 'Right below there are the tools and the respective time i\'ve worked over time in my career:',
        ],
        'places' => [
            'title' => 'Experiences',
            'data' => [
                'company' => 'Company',
                'duration' => 'Duration',
                'rated_skills' => 'Most rated skills',
                'description' => 'Description',
            ],
        ],
        'contact' => [
            'title' => 'Contact',
            'data' => [
                'name' => 'Name',
                'email' => 'E-mail',
                'subject' => 'Subject',
                'message' => 'Message',
                'send' => 'Send <3',
            ],
        ],
        'footer' => [
            'description' => 'You can find this whole project on <a href=":footerLink" target="_blank">Github</a>. '.env('APP_NAME').' © '.date('Y'),
        ],
    ],
];
