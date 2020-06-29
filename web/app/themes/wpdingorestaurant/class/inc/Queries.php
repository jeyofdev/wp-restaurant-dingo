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
    public static function init () : void
    {
        self::set_search_args();
        self::set_sortable_args_post_type_testimonial();
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



    /**
     * Set the parameters of the query to filter the columns of testimonial post type in the admin
     *
     * @return void
     */
    public static function set_sortable_args_post_type_testimonial () : void
    {
        add_action("pre_get_posts", function (WP_Query $query) {
            if(!is_admin() || ! $query->is_main_query()) {
                return;
            };

            if ("testimonial_author" === $query->get("orderby")) {
                $query->set("orderby", "meta_value");
                $query->set("meta_key", "testimonial_author");
            }
        });
    }
}