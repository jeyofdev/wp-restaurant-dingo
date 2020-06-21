<?php

namespace jeyofdev\wp\dingo\restaurant\inc;

use jeyofdev\wp\dingo\restaurant\widgets\PostCategoryWidget;
use jeyofdev\wp\dingo\restaurant\widgets\RecentPostsWidget;
use jeyofdev\wp\dingo\restaurant\widgets\SearchWidget;
use jeyofdev\wp\dingo\restaurant\widgets\TagCloudWidget;



/**
 * Class which manages the sidebars
 */
class Sidebar 
{
    /**
     * Registers all the widgets and sidebars 
     *
     * @return void
     */
    public static function init () : void
    {
        add_action("widgets_init", function ()
        {
            self::unregister_widget();
            self::register_widget();
            self::register_sidebar();
        });
    }



    /**
     * Register a widget
     *
     * @return void
     */
    public static function register_widget () : void
    {
        register_widget(RecentPostsWidget::class);
        register_widget(TagCloudWidget::class);
        register_widget(PostCategoryWidget::class);
        register_widget(SearchWidget::class);
    }



    /**
     * Unregisters a widget
     *
     * @return void
     */
    public static function unregister_widget () : void
    {
        unregister_widget("WP_Widget_Recent_Posts");
        unregister_widget("WP_Widget_Tag_Cloud");
        unregister_widget("WP_Widget_Categories");
        unregister_widget("WP_Widget_Search");
    }



    /**
     * Register a sidebar
     *
     * @return void
     */
    public static function register_sidebar () : void
    {
        register_sidebar([
            "id" => "blog",
            "name" => __("Blog sidebar", "estateagency"),
            'before_widget' => '<aside id="%1$s" class="single_sidebar_widget %2$s">',
            'after_widget'  => "</aside>",
            'before_title'  => '<h4 class="widget_title">',
            'after_title'   => "</h4>",
        ]);
    }
}