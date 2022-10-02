<?php

namespace App\Services;

use App\Models\Post;

class PostService
{
    public function __construct()
    {
    }

    public function new()
    {
        return new Post;
    }

}