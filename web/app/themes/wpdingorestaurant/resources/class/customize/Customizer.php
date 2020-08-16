<?php

namespace jeyofdev\wp\dingo\restaurant\customize;



/**
 * Class which manages the customizer
 */
class Customizer
{
    public function __construct ()
    {
        InitCustomizer::init();
        $this->init();

        return $this->get_fields();
    }



    /**
     * Initialize the customizer with Kirki
     *
     * @return void
     */
    private function init () : void
    {
        if (!class_exists("Kirki")) {
            require_once dirname(__FILE__) . "/kirki/kirki.php";
            // require_once get_template_directory_uri() . "/class/customize/kirki/kirki.php";

            /**
             * Implement the theme options using Kirki.
             */
            new FieldsCustomizer();

            add_filter("kirki_telemetry", "__return_false");
        }
    }



    /**
     * @return FieldsCustomizer|null
     */
    private function get_fields () : ?FieldsCustomizer
    {
        return FieldsCustomizer::instance();
    }
}
