<?php

namespace Aleksei4er\TaskNewsParser\Http\Collections;

use Aleksei4er\TaskNewsParser\Http\Resources\ArticleResource;
use Illuminate\Support\Arr;
use App\Models\Project\Offer;
use Illuminate\Support\Collection;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ArticleCollection extends ResourceCollection
{
    /**
     * Undocumented function
     *
     * @param \Dingo\Api\Http\Request $request
     * @return Collection
     */
    public function toArray($request): Collection
    {
        switch ($request->input('groupBy')) {
            case 'source':
                $result = $this->collection->mapToGroups(function($item, $key) {
                    return [$item->source->name => ArticleResource::make($item)];
                });
            break;
            case 'keyword':
                $result = $this->collection->mapToGroups(function($item, $key) {
                    return [$item->keyword => ArticleResource::make($item)];
                });
            break;
            case 'date':
                $result = $this->collection->mapToGroups(function($item, $key) {
                    return [$item->publishedAt->format('d-m-Y') => ArticleResource::make($item)];
                });
            break;
            default:
                $result = $this->collection->map(function($item) {
                    return ArticleResource::make($item);
                });
            break;
        }

        return $result;
    }
}
