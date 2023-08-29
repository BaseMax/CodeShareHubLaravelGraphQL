<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Tag extends Model
{
    use HasFactory;

    protected $table = "tags";

    protected $fillable = [
        "name"
    ];

    public function snippets(): HasManyThrough
    {
        return $this->hasManyThrough(Snippet::class, SnippetTag::class);
    }
}
