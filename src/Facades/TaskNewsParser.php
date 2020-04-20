<?php

namespace Aleksei4er\TaskNewsParser\Facades;

use Illuminate\Support\Facades\Facade;

class TaskNewsParser extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'task-news-parser';
    }
}
