<?php

namespace Aleksei4er\TaskNewsParser\Tests;

use Aleksei4er\TaskNewsParser\Facades\TaskNewsParser;
use Aleksei4er\TaskNewsParser\ServiceProvider;
use Orchestra\Testbench\TestCase;

class TaskNewsParserTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [ServiceProvider::class];
    }

    protected function getPackageAliases($app)
    {
        return [
            'task-news-parser' => TaskNewsParser::class,
        ];
    }

    public function testExample()
    {
        $this->assertEquals(1, 1);
    }
}
