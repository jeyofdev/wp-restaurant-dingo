<?php

namespace jeyofdev\wp\dingo\restaurant;

use Timber\Menu;



/**
 * class which manages the context array
 */
class Context {

    /**
     * Save the navigation menu in the context
     *
     * @return void
     */
    public static function add_menu () : void
    {
        add_filter("timber/context", function (array $context) {
            $context["menu"] = new Menu("primary");

            return $context;
        });
    }
}
