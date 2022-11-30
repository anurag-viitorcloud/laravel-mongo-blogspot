<?php

namespace App\Models\Blog\Traits\Relationships;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Trait BlogRelationships
 */
trait BlogRelationships
{
    /**
     * Get the user associated with the blog.
     * 
     * @return BelongsTo
     */
    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(config('model-variables.models.user.class'));
    }

}
