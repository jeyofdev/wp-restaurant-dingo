<?php

namespace jeyofdev\wp\dingo\restaurant\inc;



/**
 * Class which manages the images
 */
class PostTypes {

    /**
     * Load all post types
     *
     * @return void
     */
    public static function load () : void
    {
        add_action("init", function () {
            self::register_post_type();
        });
    }



    /**
     * Registers a post type
     *
     * @return void
     */
    public static function register_post_type () : void
    {
        register_post_type("chef", [
            "label" => __("Chefs", "dingo"),
            "labels" => [
                "name"                     => __("Chefs", "dingo"),
                "singular_name"            => __("Chef", "dingo"),
                "edit_item"                => __("Edit chef", "dingo"),
                "new_item"                 => __("New chef", "dingo"),
                "view_item"                => __("View chef", "dingo"),
                "view_items"               => __("View chefs", "dingo"),
                "search_items"             => __("Search chefs", "dingo"),
                "not_found"                => __("No chefs found.", "dingo"),
                "not_found_in_trash"       => __("No chefs found in trash.", "dingo"),
                "all_items"                => __("All chefs", "dingo")
            ],
            "public" => true,
            "hierarchical" => false,
            "exclude_from_search" => true,
            "menu_position" => 30,
            "menu_icon" => "dashicons-admin-users",
            "supports" => ["title", "thumbnail"],
            "show_in_rest" => false,
            "taxonomies" => [],
            "has_archive" => false
        ]);
    }
}
