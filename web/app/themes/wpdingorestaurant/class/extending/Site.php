<?php

namespace jeyofdev\wp\dingo\restaurant\extending;

use Timber\Site as TimberSite;
use jeyofdev\wp\dingo\restaurant\inc\Menus;
use jeyofdev\wp\dingo\restaurant\inc\Title;
use jeyofdev\wp\dingo\restaurant\inc\Assets;
use jeyofdev\wp\dingo\restaurant\inc\Images;
use jeyofdev\wp\dingo\restaurant\inc\Styles;
use jeyofdev\wp\dingo\restaurant\inc\Queries;
use jeyofdev\wp\dingo\restaurant\inc\Sidebar;
use jeyofdev\wp\dingo\restaurant\inc\Settings;
use jeyofdev\wp\dingo\restaurant\inc\Supports;
use jeyofdev\wp\dingo\restaurant\inc\PostTypes;
use jeyofdev\wp\dingo\restaurant\inc\Taxonomies;
use jeyofdev\wp\dingo\restaurant\customize\Customizer;



/**
 * Class which manages the useful information of the application
 */
class Site extends TimberSite
{
    public function __construct ()
    {
        parent::__construct();

        Settings::init();
        Supports::init();
        Title::init();
        Menus::init();
        Assets::init();
        Images::init();
        Sidebar::init();
        Styles::init();
        Queries::init();
        PostTypes::init();
        Taxonomies::init();

        return new Customizer();
    }
}