<?php

namespace jeyofdev\wp\dingo\restaurant\App;

use jeyofdev\wp\dingo\restaurant\inc\Comments;



/**
 * Class which manages the comments
 */
class Comment
{
    public function __construct ()
    {
        Comments::comment_reply_link();
    }
}
