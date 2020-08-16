<?php

namespace jeyofdev\wp\dingo\restaurant\widgets;

use \WP_Widget;
use jeyofdev\wp\dingo\restaurant\extending\Timber;



/**
 * Class which manages the post category widget
 */
class PostCategoryWidget extends WP_Widget {

    /**
     * @var array
     */
    public $fields = [];


    
    /**
	 * Sets up a new widget instance.
	 */
	public function __construct() {
		parent::__construct("dingo_post_category_widget", __("Categories", "dingo"), [
            "classname" => "post_category_widget",
			"description" => __("A list of categories.", "dingo"),
			"customize_selective_refresh" => true,
        ]);

        $this->fields = [
            "title" => __("Title", "dingo"),
            "count" => __("Show post counts ?", "dingo"),
            "hierarchical" => __("Show hierarchy ?", "dingo")
        ];
	}



	/**
	 * Outputs the content for the widget instance
	 *
	 * @param array $args     Display arguments including 'before_title', 'after_title',
	 *                        'before_widget', and 'after_widget'.
	 * @param array $instance Settings for the current widget instance.
	 */
	public function widget($args, $instance) {
        if (!class_exists("Timber")) {
            return;
        }

        // title
        $instance["title"] = !empty($instance["title"]) ? apply_filters("widget_title", $instance["title"], $instance, $this->id_base) : __("Categories", "dingo");

        // 
        $instance["count"] = isset($instance["count"]) ? (bool)$instance["count"] : false;
        $instance["hierarchical"] = isset($instance["hierarchical"]) ? (bool)$instance["hierarchical"] : false;

        // categories
		$cat_args = [
            "taxonomy" => "category",
			"orderby" => "name",
			"show_count" => $instance["count"],
            "hierarchical" => $instance["hierarchical"],
            "title_li"            => false,
            "echo"                => false,
            "style"               => "list",
        ];

        $categories = wp_list_categories(apply_filters("widget_categories_args", $cat_args, $instance));
        $categories = explode("\n\t", $categories);

        Timber::render("widgets/post-category-widget.twig", [
            "args" => $args,
            "instance" => $instance,
            "categories" => $categories,
            "count" => $instance["count"]
        ]);
	}



	/**
	 * Outputs the settings form for the widget
	 *
	 * @param array $instance Current settings
	 */
	public function form($instance) {
		$title = isset($instance["title"]) ? esc_attr($instance["title"]) : '';
        $count = isset($instance["count"]) ? (bool) $instance["count"] : false;
        $hierarchical = isset($instance["hierarchical"]) ? (bool) $instance["hierarchical"] : false;
        ?>

            <p>
                <label for="<?= $this->get_field_id('title'); ?>"><?= $this->fields["title"]; ?></label>
                <input
                    type="text"
                    class="widefat"
                    id="<?= $this->get_field_id('title'); ?>"
                    name="<?= $this->get_field_name('title'); ?>"
                    value="<?= $title; ?>" />
            </p>

            <p>
                <input 
                    type="checkbox"
                    class="checkbox"
                    id="<?= $this->get_field_id('count'); ?>"
                    name="<?= $this->get_field_name('count'); ?>" 
                    <?php checked($count); ?> />
                <label for="<?= $this->get_field_id('count'); ?>"><?= $this->fields["count"] ?></label>
            </p>

            <p>
                <input 
                    type="checkbox"
                    class="checkbox"
                    id="<?= $this->get_field_id('hierarchical'); ?>"
                    name="<?= $this->get_field_name('hierarchical'); ?>" 
                    <?php checked($hierarchical); ?> />
                <label for="<?= $this->get_field_id('hierarchical'); ?>"><?= $this->fields["hierarchical"] ?></label>
            </p>
		<?php
	}



	/**
	 * Handles updating the settings for the current widget instance
	 *
	 * @param array $new_instance New settings for this instance as input by the user via WP_Widget::form()
	 * @param array $old_instance Old settings for this instance
	 * @return array Updated settings to save
	 */
	public function update ($newInstance, $oldInstance)
    {
        $output = $oldInstance;

		$output["title"] = sanitize_text_field( $newInstance["title"] );
        $output["count"] = isset($newInstance["count"] ) ? (bool)$newInstance["count"] : false;
        $output["hierarchical"] = isset($newInstance["hierarchical"] ) ? (bool)$newInstance["hierarchical"] : false;

        return $output;
    }
}
