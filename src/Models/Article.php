<?php

namespace Aleksei4er\TaskNewsParser\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $dates = [
        'publishedAt',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'keyword',
        'author',
        'title',
        'description',
        'url',
        'urlToImage',
        'content',
        'publishedAt',
        'source_id',
    ];

    /**
     * Source relation
     *
     * @return BelongsTo
     */
    public function source(): BelongsTo
    {
        return $this->belongsTo(Source::class, 'source_id');
    }
}
