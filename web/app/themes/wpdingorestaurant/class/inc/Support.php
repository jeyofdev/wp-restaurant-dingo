<?php

namespace jeyofdev\wp\dingo\restaurant\inc;



/**
 * Class which manages the theme supports
 */
class Supports {

    /**
     * Registers theme supports
     *
     * @return void
     */
    public static function add () : void
    {
        add_action("after_setup_theme", function () {
            add_theme_support("menus");
        });
    }
}