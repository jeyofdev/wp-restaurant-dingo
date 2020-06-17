<?php

namespace jeyofdev\wp\dingo\restaurant\extending;

use Timber\Post as TimberPost;
use jeyofdev\wp\dingo\restaurant\inc\Pagination;



/**
 * Class which manages the posts
 */
class Post extends TimberPost
{
    public function __construct ()
    {
        parent::__construct();
        Pagination::load();
    }
}