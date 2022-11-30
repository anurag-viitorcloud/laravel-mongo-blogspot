<?php

namespace App\Models\Blog;

use App\Models\Blog\Traits\Relationships\BlogRelationships;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Jenssegers\Mongodb\Eloquent\Model;
use Illuminate\Support\Str;

class Blog extends Model
{
    use HasFactory, SoftDeletes, BlogRelationships;
    
    protected $connection = 'mongodb';
    protected $collection = 'blogs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'blog_id',
        'uuid',
        'title',
        'description',
        'post',
        'created_by',
        'status'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    /**
     * @return void
     */
    protected static function boot(): void
    {
        parent::boot();

        static::creating(function ($query) {
            $query->uuid = Str::uuid();
            $query->created_by = auth()->guard(config('app.guards.web'))->user()->user_id ?? null;
        });
    }
}
