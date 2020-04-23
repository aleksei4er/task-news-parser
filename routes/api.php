<?php

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {
    $api->get('articles', 'Aleksei4er\TaskNewsParser\Http\Controllers\ArticleController@index');
});
