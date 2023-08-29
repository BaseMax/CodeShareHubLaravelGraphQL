<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;

    protected $table = "comments";

    protected $fillable = [
        "text",
        "user_id",
        "snippet_id"
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function snippet(): BelongsTo
    {
        return $this->belongsTo(Snippet::class, "snippet_id");
    }
}
