<?php

namespace jeyofdev\wp\dingo\restaurant\customize;

use Kirki;



/**
 * Class which manages the theme options of the customizer
 */
class FieldsCustomizer 
{
	/**
	 * @var FieldsCustomizer|null
	 */
	private static $_instance = null;



	/**
	 * @var array
	 */
	private $sections = [];



	/**
	 * @var array
	 */
    private $fields = [];



	public function __construct() {
		$this->kirki_config();
		$this->add_panels();
		$this->add_sections();
        $this->add_fields();

        add_action("customize_controls_print_styles", [$this, "control_styles"]);
    }



	/**
	 * @return FieldsCustomizer|null
	 */
	public static function instance () : ?FieldsCustomizer
	{
        if (self::$_instance === null) {
            self::$_instance = new FieldsCustomizer();
        }

        return self::$_instance;
    }



    /**
     * Set the Kirki configuration
     *
     * @return void
     */
    private function kirki_config () : void
    {
		Kirki::add_config("dingo_config", [
			"url_path"      => get_stylesheet_directory_uri() . "/class/customize/kirki/kirki.php",
			"capability"    => "edit_theme_options",
			"option_type"   => "theme_mod",
		]);
    }



	/**
	 * Add customizer panels
	 *
	 * @return void
	 */
    private function add_panels () : void
    {
        // Add theme options panel
        Kirki::add_panel("dingo_theme_option", [
            "priority"    => 30,
            "title"       => esc_html__("Theme options", "dingo"),
        ]);
    }



	/**
	 * Add customizer sections
	 *
	 * @return void
	 */
    private function add_sections () : void
    {
		$this->sections = $this->set_sections();

		if(!empty($this->sections)) {
			foreach ($this->sections as $key => $section) {
				Kirki::add_section($key, $section);
			}
		}
    }




	/**
	 * Add customizer fields
	 *
	 * @return void
	 */
    private function add_fields () : void
    {
        $this->fields = $this->set_fields ();

		if(!empty($this->fields)) {
			foreach ($this->fields as $field) {
				Kirki::add_field("dingo_config", $field);
			}
		}
	}



	/**
	 * Set the customizer sections
	 *
	 * @return void
	 */
    private function set_sections () : array
    {
        $sections = [];

		return $sections;
    }



	/**
	 * Set the customizer fields
	 *
	 * @return array
	 */
    private function set_fields () : array
    {
		$fields = [];

		return $fields;
	}
}