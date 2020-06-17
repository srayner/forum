<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Vote
 *
 * @author Steve Rayner stephen.rayner@marmalade.co.uk
 * @package App
 */
class Vote extends Model
{
    /**
     * Get the category that the post belongs to.
     *
     * @return BelongsTo
     */
    public function comment()
    {
        return $this->belongsTo('App\Comment');
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
