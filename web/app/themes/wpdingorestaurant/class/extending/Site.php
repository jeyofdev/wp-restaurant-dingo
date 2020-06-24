<?php

namespace jeyofdev\wp\dingo\restaurant\extending;

use Timber\Site as TimberSite;
use jeyofdev\wp\dingo\restaurant\inc\Assets;
use jeyofdev\wp\dingo\restaurant\inc\Images;
use jeyofdev\wp\dingo\restaurant\inc\Menus;
use jeyofdev\wp\dingo\restaurant\inc\PostTypes;
use jeyofdev\wp\dingo\restaurant\inc\Queries;
use jeyofdev\wp\dingo\restaurant\inc\Sidebar;
use jeyofdev\wp\dingo\restaurant\inc\Styles;
use jeyofdev\wp\dingo\restaurant\inc\Supports;
use jeyofdev\wp\dingo\restaurant\inc\Taxonomies;



/**
 * Class which manages the useful information of the application
 */
class Site extends TimberSite
{
    public function __construct ()
    {
        parent::__construct();

        Supports::add();
        Menus::register();
        Assets::load();
        Images::load();
        Sidebar::init();
        Styles::load();
        Queries::load();
        PostTypes::load();
        Taxonomies::load();
    }
}