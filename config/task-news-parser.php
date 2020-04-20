<?php

return [

    'api_url' => env('TASK_NEWS_PARSER_NEWSAPI_URL', ''),

    'request_timeout' => env('TASK_NEWS_PARSER_TIMEOUT', 15),

    'filter_parameters' => [
        'q' => '',
        'from' => date('Y-m-d'),
        'sortBy' => 'publishedAt',
        'apiKey' => env('TASK_NEWS_PARSER_NEWSAPI_KEY', ''),
    ],

    'keywords' => explode(",", env('TASK_NEWS_PARSER_KEYWORDS', '')),

    'cache_prefix' => env('TASK_NEWS_PARSER_CACHE_PREFIX', 'task_news_parser_'),

    /**
     * Be careful! After you have changed max_length value, you have to update the database scheme.
     */
    'max_length' => [
        'description' => 500,
        'content' => floor((pow(2, 16) - 1) / 4),
    ]
];
