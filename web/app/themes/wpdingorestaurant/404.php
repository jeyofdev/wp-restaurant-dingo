<?php

/**
 * The 404 template file
 */

use jeyofdev\wp\dingo\restaurant\extending\Timber;



$context = Timber::context();
$templates = "errors/404.twig";



Timber::render($templates, $context);