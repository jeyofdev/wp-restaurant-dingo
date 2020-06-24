<?php

namespace jeyofdev\wp\dingo\restaurant\widgets;

use jeyofdev\wp\dingo\restaurant\options\RestaurantSettings;
use \WP_Widget;
use Timber\Timber;



/**
 * Class which manages the contact widget
 */
class ContactWidget extends WP_Widget {

    /**
     * @var array
     */
    public $fields = [];


    
    /**
	 * Sets up a new widget instance.
	 */
	public function __construct() {
		parent::__construct("dingo_contact_widget", __("Contact", "dingo"), [
            "classname" => "contact_widget",
			"description" => __("Displays the contact informations.", "dingo"),
			"customize_selective_refresh" => true,
        ]);

        $this->fields = [
            "title" => __("Title", "dingo")
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


        Timber::render("widgets/contact-widget.twig", [
            "args" => $args,
            "instance" => $instance,
            "contact" => [
                "address" => get_option(RestaurantSettings::ADDRESS),
                "phone" => get_option(RestaurantSettings::PHONE),
                "email" => !empty(get_option(RestaurantSettings::EMAIL)) ? get_option(RestaurantSettings::EMAIL) : get_option("admin_email")
            ] 
        ]);
	}



	/**
	 * Outputs the settings form for the widget
	 *
	 * @param array $instance Current settings
	 */
	public function form($instance) {
		$title = isset($instance["title"]) ? esc_attr($instance["title"]) : '';
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

        return $output;
    }
}
