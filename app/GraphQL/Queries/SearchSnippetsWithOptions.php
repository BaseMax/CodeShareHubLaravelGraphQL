<?php

namespace App\GraphQL\Queries;

use App\Models\Snippet;

final class SearchSnippetsWithOptions
{
    /**
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $snippets = Snippet::where("title", "like", "%" . $args["keyword"] . "%")
            ->orWhere("description", "like", "%" . $args["keyword"] . "%")
            ->orWhere("code", "like", "%" . $args["keyword"] . "%")
            ->get();
        return $snippets;
    }
}
