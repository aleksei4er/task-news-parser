<?php

namespace Aleksei4er\TaskNewsParser\Http\Controllers;

use Aleksei4er\TaskNewsParser\Models\Article;
use Aleksei4er\TaskNewsParser\Http\Collections\ArticleCollection;
use Illuminate\Routing\Controller;

class ArticleController extends Controller
{
    /**
     * Page listing of articles
     *
     * @return ArticleCollection
     */
    public function index(): ArticleCollection
    {
        $articles = Article::with('source')->paginate(10);

        return ArticleCollection::make($articles);
    }
}
