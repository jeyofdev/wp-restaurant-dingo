<?php

/**
 * The single post template file
 */

use Timber\Timber;
use jeyofdev\wp\dingo\restaurant\extending\Post;
use jeyofdev\wp\dingo\restaurant\extending\Site;



$context = Timber::context();
$context["site"] = new Site();
$context["post"] = new Post();

$templates = "pages/single-post.twig";



Timber::render($templates, $context);