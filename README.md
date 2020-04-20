# Task News Parser

[![GitHub Workflow Status](https://github.com/aleksei4er/task-news-parser/workflows/Run%20tests/badge.svg)](https://github.com/aleksei4er/task-news-parser/actions)
[![styleci](https://styleci.io/repos/CHANGEME/shield)](https://styleci.io/repos/CHANGEME)

[![Packagist](https://img.shields.io/packagist/v/aleksei4er/task-news-parser.svg)](https://packagist.org/packages/aleksei4er/task-news-parser)
[![Packagist](https://poser.pugx.org/aleksei4er/task-news-parser/d/total.svg)](https://packagist.org/packages/aleksei4er/task-news-parser)
[![Packagist](https://img.shields.io/packagist/l/aleksei4er/task-news-parser.svg)](https://packagist.org/packages/aleksei4er/task-news-parser)

Package description: CHANGE ME

## Installation

Install via composer
```bash
composer require aleksei4er/task-news-parser
```

### Setup enviroment variables

```bash
TASK_NEWS_PARSER_NEWSAPI_KEY=YOUR_KEYNAME (visit https://newsapi.org/)
TASK_NEWS_PARSER_TIMEOUT=15
TASK_NEWS_PARSER_NEWSAPI_URL=http://newsapi.org/v2/everything
TASK_NEWS_PARSER_KEYWORDS=bitcoin,litecoin,ripple,dash,ethereum (one article for each keyword by default)
```

### Run migrations

```bash
php artisan migrate
```

### Make sure this lines are uncommented in bootstrap/app.php

```bash
$app->withFacades();
$app->withEloquent();
```

### Register service provider in the same file

```bash
$app->register(Aleksei4er\TaskNewsParser\ServiceProvider::class);
```

## Usage

You can create schedule for console command or run it manually
```bash
php artisan task:newsparser
```

## Security

If you discover any security related issues, please email 
instead of using the issue tracker.

## Credits

- [](https://github.com/aleksei4er/task-news-parser)
- [All contributors](https://github.com/aleksei4er/task-news-parser/graphs/contributors)

This package is bootstrapped with the help of
[melihovv/laravel-package-generator](https://github.com/melihovv/laravel-package-generator).
