<?php

namespace jeyofdev\wp\dingo\restaurant\widgets;

use \WP_Widget;
use jeyofdev\wp\dingo\restaurant\options\RestaurantSettings;
use jeyofdev\wp\dingo\restaurant\extending\Timber;



/**
 * Class which manages the recent posts widget
 */
class OpeningHoursWidget extends WP_Widget {

    /**
     * @var array
     */
    public $fields = [];


    /**
	 * Sets up a new widget instance
	 */
	public function __construct()
    {
        parent::__construct("dingo_opening_hours_widget", __("Opening hours", "dingo"), [
            "classname" => "Opening hours_widget",
			"description" => __("Displays the restaurant opening hours.", "dingo"),
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
	public function widget ($args, $instance)
    {
        if (!class_exists("Timber")) {
            return;
        }

        // title
        $instance["title"] = !empty($instance["title"]) ? apply_filters("widget_title", $instance["title"], $instance, $this->id_base) : __("Opening hours", "dingo");

        // days
        $days = [
            __("Monday", "dingo"),
            __("Tuesday", "dingo"),
            __("Wednesday", "dingo"),
            __("Thursday", "dingo"),
            __("Friday", "dingo"),
            __("Saturday", "dingo"),
            __("Sunday", "dingo")
        ];

        // hours
        $opening_hours = explode("\r\n", get_option(RestaurantSettings::OPENING_HOURS));
    
        $hours = [];
        foreach ($opening_hours as $value) {
            $pos = strpos($value, " : ");
            $hours[] = substr($value, $pos + 3);
        }

        Timber::render("widgets/opening_hours-widget.twig", [
            "args" => $args,
            "instance" => $instance,
            "days" => $days,
            "opening_hours" => $hours
        ]);
    }



	/**
	 * Outputs the settings form for the widget
	 *
	 * @param array $instance Current settings
	 */
    public function form ($instance)
    {
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
