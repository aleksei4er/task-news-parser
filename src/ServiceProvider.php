<?php

namespace Aleksei4er\TaskNewsParser;

use Aleksei4er\TaskNewsParser\Console\Commands\TaskNewsParserCommand;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    const CONFIG_PATH = __DIR__ . '/../config/task-news-parser.php';
    const MIGRATIONS_PATH =  __DIR__ . '/../database/migrations';
    const ROUTES_PATH =  __DIR__ . '/../routes/api.php';

    public function boot()
    {
        $this->publishes([
            self::CONFIG_PATH => config_path('task-news-parser.php'),
        ], 'config');

        $this->loadRoutesFrom(self::ROUTES_PATH);
    }

    public function register()
    {
        require_once("helpers.php");
        
        $this->mergeConfigFrom(
            self::CONFIG_PATH,
            'task-news-parser'
        );

        $this->app->singleton('task-news-parser', function () {
            return new TaskNewsParser(config('task-news-parser'));
        });

        if ($this->app->runningInConsole()) {
            $this->commands([
                TaskNewsParserCommand::class,
            ]);
        }

        $this->loadMigrationsFrom(self::MIGRATIONS_PATH);
    }
}
