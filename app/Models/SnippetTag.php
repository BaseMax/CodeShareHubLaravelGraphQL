<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SnippetTag extends Model
{
    use HasFactory;

    protected $fillable = [
        "tag_id",
        "snippet_id"
    ];

    protected $table = "snippet_tag";

    public function snippet(): BelongsTo
    {
        return $this->belongsTo(Snippet::class);
    }

    public function tag(): BelongsTo
    {
        return $this->belongsTo(Tag::class);
    }
}
