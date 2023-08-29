<?php

namespace App\GraphQL\Mutations;

use App\Models\SnippetTag;

final class AddTagToSnippet
{
    /**
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $snippetTag = SnippetTag::create([
            "snippet_id" => $args["snippet_id"],
            "tag_id"     => $args["tag_id"]
        ]);
        return $snippetTag;
    }
}
