<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Comment
 *
 * @author Steve Rayner stephen.rayner@marmalade.co.uk
 * @package App
 */
class Comment extends Model
{
    protected $fillable = ['message'];

    /**
     * Get the category that the post belongs to.
     *
     * @return BelongsTo
     */
    public function post()
    {
        return $this->belongsTo('App\Post');
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
}
