<?php

/**
 * The template for displaying Archive pages.
 */

use jeyofdev\wp\dingo\restaurant\extending\Timber;



$context = Timber::context();
$templates = "pages/archive.twig";



Timber::render($templates, $context);