<?php

/**
 * The single post template file
 */

use jeyofdev\wp\dingo\restaurant\extending\Comment;
use jeyofdev\wp\dingo\restaurant\extending\CommentForm;
use Timber\Timber;
use jeyofdev\wp\dingo\restaurant\extending\Post;
use jeyofdev\wp\dingo\restaurant\extending\Site;



$context = Timber::context();
$context["site"] = new Site();
$context["post"] = new Post();
$context["comment"] = new Comment();
$context["comment-form"] = new CommentForm();

$templates = "pages/single-post.twig";



Timber::render($templates, $context);