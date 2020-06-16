<?php

use Timber\Timber;
use jeyofdev\wp\dingo\restaurant\Context;
use jeyofdev\wp\dingo\restaurant\extending\Site;
use jeyofdev\wp\dingo\restaurant\extending\Twig;



// timber
$timber = new Timber();
Timber::$autoescape = true;
Timber::$dirname = "templates";



new Twig();
new Site();
Context::add_menu();
