<?php

/**
 * The single post template file
 */


use jeyofdev\wp\dingo\restaurant\App\Comment;
use jeyofdev\wp\dingo\restaurant\extending\Post;
use jeyofdev\wp\dingo\restaurant\App\CommentForm;
use jeyofdev\wp\dingo\restaurant\extending\Timber;



$context = Timber::context();
$context["post"] = new Post();
$context["comment"] = new Comment();
$context["comment-form"] = new CommentForm();

$templates = "pages/single-post.twig";


Timber::render($templates, $context);