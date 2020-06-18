<?php

namespace jeyofdev\wp\dingo\restaurant\customize;

use \WP_Customize_Manager;
use \WP_Customize_Image_Control;



/**
 * Class which manages the customization options
 */
class Customizer
{
    public function __construct()
    {
        add_action("customize_register", [$this, "deregister"]);
        add_action("customize_register", [$this, "customize_logo_register"]);
        add_action("customize_register", [$this, "customize_breadcrumb_register"]);
    }



    /**
     * Remove customization options
     *
     * @param WP_Customize_Manager $manager
     * @return void
     */
    public function deregister(WP_Customize_Manager $manager): void
    {
        $manager->remove_section("static_front_page");
    }



    /**
     * Add the logo customization option
     *
     * @param WP_Customize_Manager $wp_customize
     * 
     * @return void
     */
    public function customize_logo_register(WP_Customize_Manager $manager): void
    {
        $manager->add_section("dingo_logo", [
            "title" => __("Logo", "dingo")
        ]);

        $manager->add_setting("logo", [
            "sanitise_callback" => "esc_url_raw"
        ]);

        $manager->add_control(new WP_Customize_Image_Control($manager, "logo", [
            "section" => "dingo_logo",
            "label" => __("Upload a logo", "dingo")
        ]));
    }



    /**
     * Add the option to customize the background of the breadcrumb
     *
     * @param WP_Customize_Manager $wp_customize
     * 
     * @return void
     */
    public function customize_breadcrumb_register(WP_Customize_Manager $manager): void
    {
        $manager->add_section("dingo_breadcrumb", [
            "title" => __("breadcrumb", "dingo")
        ]);

        $manager->add_setting("breadcrumb-background-image", [
            "sanitise_callback" => "esc_url_raw"
        ]);

        $manager->add_control(new WP_Customize_Image_Control($manager, "breadcrumb-background-image", [
            "section" => "dingo_breadcrumb",
            "label" => __("Background-color", "dingo")
        ]));
    }
}