<?php

namespace jeyofdev\wp\dingo\restaurant\inc;



/**
 * Class which manages the taxonomies
 */
class Taxonomies {

    /**
     * Load all custom taxonomies
     *
     * @return void
     */
    public static function load () : void
    {
        add_action("init", function () {
            self::register_taxonomy();
        });
    }



    /**
     * Registers taxonomies
     *
     * @return void
     */
    public static function register_taxonomy () : void
    {
        register_taxonomy("food_menu_type", "food_menu", [
            "labels" => [
                "name"                       => __( "Types", "dingo"),
                "singular_name"              => __( "Type", "dingo"),
                "search_items"               => __( "Search Types", "dingo"),
                "popular_items"              => __( "Popular Types", "dingo"),
                "all_items"                  => __( "All Types", "dingo"),
                "edit_item"                  => __( "Edit Type", "dingo"),
                "view_item"                  => __( "View Type", "dingo"),
                "update_item"                => __( "Update Type", "dingo"),
                "add_new_item"               => __( "Add New Type", "dingo"),
                "not_found"                  => __( "No Types found.", "dingo"),
                "no_terms"                   => __( "No Types", "dingo"),
                "back_to_items"              => __( "&larr; Back to Types", "dingo")
            ],
            "hierarchical" => true,
            "meta_box_cb" => "post_categories_meta_box",
            "has_archive" => false,
        ]);
    }
}
