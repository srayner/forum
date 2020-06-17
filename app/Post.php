<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Post
 *
 * @author Steve Rayner stephen.rayner@marmalade.co.uk
 * @package App
 */
class Post extends Model
{
    protected $fillable = ['title', 'body'];

    /**
     * Get the category that the post belongs to.
     *
     * @return BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    /**
     * Get the user that created the post.
     *
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * @return HasMany
     */
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
