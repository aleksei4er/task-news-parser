<?php

namespace Aleksei4er\TaskNewsParser\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
{
    /**
     * Undocumented function
     *
     * @param \Dingo\Api\Http\Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'title' => $this->title,
            'keyword' => $this->keyword,
            'author' => $this->author,
            'description' => $this->description,
            'url' => $this->url,
            'urlToImage' => $this->urlToImage,
            'content' => $this->content,
            'publishedAt' => $this->publishedAt,

            'source' => new SourceResource($this->whenLoaded('source')),
        ];
    }
}
