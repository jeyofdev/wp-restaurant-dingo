<?php

namespace jeyofdev\wp\dingo\restaurant\App;

use jeyofdev\wp\dingo\restaurant\inc\Comments;



/**
 * Class that manages the form for adding comments
 */
class CommentForm
{
    public function __construct ()
    {
        comments::comment_form_default_fields();
        comments::comment_form_defaults();
    }
}


