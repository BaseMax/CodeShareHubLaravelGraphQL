<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SnippetTag extends Model
{
    use HasFactory;

    protected $fillable = [
        "tag_id",
        "snippet_id"
    ];

    protected $table = "snippet_tag";
}
