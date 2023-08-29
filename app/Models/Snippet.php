<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Snippet extends Model
{
    use HasFactory;

    protected $table = "snippets";

    protected $fillable = [
        "title",
        "description",
        "code",
        "language",
        "owner_id"
    ];

    public function tags(): HasManyThrough
    {
        return $this->hasManyThrough(Tag::class, SnippetTag::class);
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, "owner_id");
    }

    public function collaborators(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class, "snippet_id");
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, "snippet_id");
    }
}
