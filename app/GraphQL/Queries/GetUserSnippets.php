<?php

namespace App\GraphQL\Queries;

use App\Models\Snippet;

final class GetUserSnippets
{
    /**
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $snippets = Snippet::where("owner_id", $args["userId"])->get();
        return $snippets;
    }
}
