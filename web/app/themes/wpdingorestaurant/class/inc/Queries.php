<?php

namespace jeyofdev\wp\dingo\restaurant\inc;

use WP_Query;



/**
 * Class which manages the queries
 */
class Queries {

    /**
     * Load all query
     *
     * @return void
     */
    public static function load () : void
    {
        self::set_search_args();
    }



    /**
     * Set the parameters of the search query
     *
     * @return void
     */
    public static function set_search_args () : void
    {
        add_action("pre_get_posts", function (WP_Query $query) {
            if (is_admin() || !is_search() || !$query->is_main_query()) {
                return;
            }

            $query->set("post_type", "post");
            return $query;
        });
    }
}