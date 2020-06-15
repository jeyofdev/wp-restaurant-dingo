<?php

/**
 * The main template file
 */

use Timber\Timber;
use jeyofdev\wp\dingo\restaurant\extension\Site;



$context = Timber::context();
$context["site"] = new Site();

$templates = "pages/index.twig";



Timber::render($templates, $context);