<?php

/**
 * The blog template file
 */

use jeyofdev\wp\dingo\restaurant\extending\Timber;



$context = Timber::context();
$templates = "pages/home.twig";



Timber::render($templates, $context);