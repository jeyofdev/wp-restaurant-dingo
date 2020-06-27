<?php

/**
 * The search result template file
 */

use Timber\PostQuery;
use jeyofdev\wp\dingo\restaurant\extending\Timber;



$context = Timber::context();
$context["posts"] = new PostQuery();

$templates = ["pages/search.twig", "pages/archive.twig", "pages/index.twig"];



Timber::render($templates, $context);
