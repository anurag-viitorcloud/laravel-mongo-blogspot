<?php

namespace App\Models\User\Traits\Relationships;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Trait UserRelationships
 */
trait UserRelationships
{
    /**
     * Get the blogs associated with the user.
     * 
     * @return HasMany
     */
    public function blogs(): HasMany
    {
        return $this->hasMany(config('model-variables.models.blog.class'), 'created_by', 'id');
    }

}
