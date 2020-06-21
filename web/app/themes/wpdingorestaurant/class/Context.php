<?php

namespace jeyofdev\wp\dingo\restaurant;

use Timber\Menu;
use Timber\Timber;



/**
 * class which manages the context array
 */
class Context {

    /**
     * add information to context
     *
     * @return void
     */
    public static function add () : void
    {
        add_filter("timber/context", function (array $context) {
            $context["menu"] = new Menu("primary");

            if (is_home() || is_single() || is_archive()) {
                $context["dynamic_sidebar"] = Timber::get_widgets("blog");
            }

            return $context;
        });
    }
}
