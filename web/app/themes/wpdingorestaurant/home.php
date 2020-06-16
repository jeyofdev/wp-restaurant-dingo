<?php

/**
 * The blog template file
 */

use Timber\Timber;
use jeyofdev\wp\dingo\restaurant\extending\Site;



$context = Timber::context();
$context["site"] = new Site();

$templates = "pages/home.twig";



Timber::render($templates, $context);