<?php

namespace Aleksei4er\TaskNewsParser\Console\Commands;

use Aleksei4er\TaskNewsParser\Facades\TaskNewsParser;
use Illuminate\Console\Command;

class TaskNewsParserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'task:news-parser';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        TaskNewsParser::parse();
    }
}
