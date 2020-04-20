<?php

namespace Aleksei4er\TaskNewsParser;

use Aleksei4er\TaskNewsParser\Models\Article;
use Aleksei4er\TaskNewsParser\Models\Source;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class TaskNewsParser
{
    /**
     * Config array
     * 
     * @var array
     */
    protected $config;

    /**
     * Constructor
     *
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->config = $config;
    }


    /**
     * Parse one article for each keyword in one method call
     *
     * @return void
     */
    public function parse(): void
    {
        foreach ($this->config['keywords'] as $keyword) {
            $response = Http::timeout($this->config['request_timeout'])->get($this->getApiUrl($keyword));
            $response = json_decode($response->body(), true);
    
            foreach ($response['articles'] as $article) {
                $source = $this->loadSource($article['source']);
                if ($this->loadArticle($article, $source)) {
                    break;
                }
            }
        }
    }

    /**
     * Validate and create new article if not exists
     *
     * @param array $article
     * @param Source|null $source
     * @return Article|null
     */
    public function loadArticle(array $article, $source = null)
    {
        $validator = Validator::make($article, [
            'author' => 'string|max:255',
            'title' => 'string|max:255',
            'description' => 'string|max:' . $this->config['max_length']['description'],
            'url' => 'url|nullable|max:255|unique:' . (new Article)->getTable() . ',url',
            'urlToImage' => 'url|nullable|max:255',
            'content' => 'string|max:' . $this->config['max_length']['content'],
            'publishedAt' => 'string|max:255',
        ]);

        if (!$validator->fails()) {
            $article['source_id'] = $source->id;
            return Article::create($article);
        }
    }

    /**
     * Validate and create new source if not exists
     *
     * @param array $source
     * @return Source|null
     */
    public function loadSource(array $source)
    {
        $validator = Validator::make($source, [
            'name' => 'string|max:255',
        ]);

        if (!$validator->fails()) {
            return Source::firstOrCreate(['name' => $source['name']], $source);
        }
    }

    /**
     * Build url for request
     *
     * @param string $keyword
     * @return string
     */
    public function getApiUrl(string $keyword): string
    {
        $parameters = array_merge($this->config['filter_parameters'], ['q' => $keyword]);
        return $this->config['api_url'] . '?' . http_build_query($parameters);
    }
}
