<?php

/**
 * The search result template file
 */

use Timber\Timber;
use Timber\PostQuery;
use jeyofdev\wp\dingo\restaurant\App\Page;
use jeyofdev\wp\dingo\restaurant\extending\Site;



$context = Timber::context();
$context["site"] = new Site();
$context["page"] = new Page();
$context["posts"] = new PostQuery();

$templates = ["pages/search.twig", "pages/archive.twig", "pages/index.twig"];



Timber::render($templates, $context);
