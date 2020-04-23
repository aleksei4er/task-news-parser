<?php

use Aleksei4er\TaskNewsParser\Models\Article;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('articles')) {
            Schema::create('articles', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('source_id')->nullable();
                $table->string('keyword');
                $table->string('author')->nullable();
                $table->string('title')->nullable();
                $table->string('description', config('task-news-parser.max_length.description'))->nullable();
                $table->string('url')->unique();
                $table->string('urlToImage')->nullable();
                $table->text('content');
                $table->timestamp('publishedAt');
                $table->timestamps();

                $table->foreign('source_id')->references('id')->on('sources');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
