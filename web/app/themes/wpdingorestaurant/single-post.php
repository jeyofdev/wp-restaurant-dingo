<?php

/**
 * The single post template file
 */

use Timber\Timber;
use jeyofdev\wp\dingo\restaurant\App\Page;
use jeyofdev\wp\dingo\restaurant\App\Comment;
use jeyofdev\wp\dingo\restaurant\extending\Post;
use jeyofdev\wp\dingo\restaurant\extending\Site;
use jeyofdev\wp\dingo\restaurant\App\CommentForm;



$context = Timber::context();
$context["site"] = new Site();
$context["page"] = new Page();
$context["post"] = new Post();
$context["comment"] = new Comment();
$context["comment-form"] = new CommentForm();

$templates = "pages/single-post.twig";



Timber::render($templates, $context);