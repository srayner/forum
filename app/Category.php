<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Category
 *
 * @author Steve Rayner stephen.rayner@marmalade.co.uk
 * @package App
 */
class Category extends Model
{
    /**
     * @return HasMany
     */
    public function posts() {
        return $this->hasMany('App\Post');
    }
}
