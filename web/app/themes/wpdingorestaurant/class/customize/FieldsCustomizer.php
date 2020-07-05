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
        $sections = [
			// Add advance color options
            "dingo_color_section" => [
                "title" => esc_html__("Color", "dingo"),
				"panel" => "dingo_theme_option",
				"priority" => 30
			],
			
			// Add breadcrumb section
            "dingo_breadcrumb_section" => [
                "title" => esc_html__("Breadcrumb", "dingo"),
				"panel" => "dingo_theme_option",
				"priority" => 40
			],

			// Add banner section 
            "dingo_banner_section" => [
                "title" => esc_html__("Banner section", "dingo"),
				"panel" => "dingo_theme_option",
				"priority" => 50
			]
		];

		return $sections;
    }



	/**
	 * Set the customizer fields
	 *
	 * @return array
	 */
    private function set_fields () : array
    {
		$fields = [
			// Add primary color option
			[
				"type"        => "color",
				"settings"    => "primary_color_setting_hex",
                "transport"   => "auto",
				"label"       => esc_html__("Primary color :", "dingo"),
				"section"     => "dingo_color_section",
                "default"     => "#ff6426",
                "output" => [
                    [
                        "element"  => [
							".main_menu .main-menu-item ul li a:hover",
							".btn_1",
							"a:hover",
							".banner_part .banner_text h5",
							".blog_item_section .single_blog_item:hover .btn_3",
							"section h4",
							"section h5",
							".food_menu .nav-tabs .active",
							".blog_item_section .single_blog_text a:hover h3",
							".blog_area a:hover h2"
							
						],
						"property" => "color",
						"suffix" => "!important"
					],
					[
                        "element"  => [
							".btn_1:hover",
							".single_page_btn",
							".banner_part .banner_text .banner_btn_iner:hover .btn_2:after",
							".section_title h2:after",
							".chefs_part .single_blog_item .social_icon a:hover",
							".review_part .owl-dots button.owl-dot.active",
							".blog_right_sidebar .tag_cloud_widget ul li a:hover",
							".blog_item_img .blog_item_date",
							".button"
						],
                        "property" => "background-color"
                    ],
					[
                        "element" => [
							".menu_fixed .btn_1",
							".single_page_btn:hover",
							".chefs_part .single_blog_item .social_icon a:hover",
							".button"
						],
                        "property" => "border-color",
                    ]
				]
			],

			// Add title color option
			[
				"type"        => "color",
				"settings"    => "title_color_setting_hex",
                "transport"   => "auto",
				"label"       => esc_html__("Title color :", "dingo"),
				"section"     => "dingo_color_section",
                "default"     => "#2c3033",
                "output" => [
                    [
                        "element"  => [
							"h1", "h2", "h3", "h4", "h5", "h6",
							".navbar-light .navbar-nav .nav-link", "section a", "footer a",
							".section_title h2",
							".blog_right_sidebar .widget_title",
							".review_part .client_review_single .client_review_text h4",
							".footer-area p span",
							".single-post-area h4"
						],
						"property" => "color",
						"suffix" => "!important"
					],
				]
			],

			// Add content color option
			[
				"type"        => "color",
				"settings"    => "content_color_setting_hex",
                "transport"   => "auto",
				"label"       => esc_html__("Content color :", "dingo"),
				"section"     => "dingo_color_section",
                "default"     => "#555",
                "output" => [
                    [
                        "element"  => [
							"p", ".section_title p"
						],
						"property" => "color"
					],
				]
			],

			// Add content secondary color option
			[
				"type"        => "color",
				"settings"    => "content_secondary_color_setting_hex",
				"transport"   => "auto",
				"label"       => esc_html__("Content secondary color :", "dingo"),
				"section"     => "dingo_color_section",
				"default"     => "#fff",
				"output" => [
					[
						"element"  => [
							".btn_1:hover",
							".single_page_btn",
							".intro_video_bg h2",
							".breadcrumb .breadcrumb_iner .breadcrumb_iner_item h2",
							".blog_item_img .blog_item_date h3",
							".chefs_part .single_blog_item .social_icon a:hover",
							".blog_item_img .blog_item_date p",
							".blog_right_sidebar .tag_cloud_widget ul li a:hover"
						],
						"property" => "color",
						"suffix" => "!important"
					],
				]
			],

			// Add meta color option
			[
				"type"        => "color",
				"settings"    => "meta_color_setting_hex",
				"transport"   => "auto",
				"label"       => esc_html__("Meta color :", "dingo"),
				"section"     => "dingo_color_section",
				"default"     => "#666",
				"output" => [
					[
						"element"  => [
							".blog-info-link li a"
						],
						"property" => "color",
						"suffix" => "!important"
					],
				]
			],

			// Add pagination color option
			[
				"type"        => "color",
				"settings"    => "pagination_color_setting_hex",
				"transport"   => "auto",
				"label"       => esc_html__("Pagination color :", "dingo"),
				"section"     => "dingo_color_section",
				"default"     => "#8a8a8a",
				"output" => [
					[
						"element"  => [
							".blog-pagination .page-link",
							".contact-info .media-body p"
						],
						"property" => "color",
						"suffix" => "!important"
					],
				]
			],

			// Add widget link color option
			[
				"type"        => "color",
				"settings"    => "widgetlink_color_setting_hex",
				"transport"   => "auto",
				"label"       => esc_html__("Widget link color :", "dingo"),
				"section"     => "dingo_color_section",
				"default"     => "#555",
				"output" => [
					[
						"element"  => [
							".blog_right_sidebar .post_category_widget .cat-list li a"
						],
						"property" => "color",
						"suffix" => "!important"
					],
				]
			],

			// Add breadcrumb background image option
			[
				"type"        => "background",
				"settings"    => "breadcrumb_background_image_setting",
				"transport"   => "auto",
				"section"     => "dingo_breadcrumb_section",
				"default"     => [
					"background-color"      => "rgba(20, 20, 20, 0)",
					"background-image"      => "",
					"background-repeat"     => "repeat",
					"background-position"   => "center center",
					"background-size"       => "cover",
					"background-attachment" => "scroll",
				],
				"output" => [
					[
						"element"  => ".breadcrumb_bg",
					],
				]
			],

			// Add banner background image option
			[
				"type"        => "background",
				"settings"    => "banner_section_background_image_setting",
				"label"       => esc_html__("Banner background_image :", "dingo"),
				"transport"   => "auto",
				"section"     => "dingo_banner_section",
				"default"     => [
					"background-color"      => "rgba(255, 255, 255, 0)",
					"background-image"      => "",
					"background-repeat"     => "no-repeat",
					"background-position"   => "right top",
					"background-size"       => "contain",
					"background-attachment" => "scroll",
				],
				"output" => [
					[
						"element"  => ".banner_bg",
					],
				]
			],

			// Add banner overlay option
			[
				"type"        => "background",
				"settings"    => "banner_overlay_setting",
				"label"       => esc_html__("Banner overlay :", "dingo"),
				"transport"   => "auto",
				"section"     => "dingo_banner_section",
				"default"     => [
					"background-color"      => "rgba(255, 255, 255, 0)",
					"background-image"      => "",
					"background-repeat"     => "no-repeat",
					"background-position"   => "right bottom",
					"background-size"       => "auto",
					"background-attachment" => "scroll",
				],
				"output" => [
					[
						"element"  => ".banner_part:after",
					],
				]
				],
		];

		return $fields;
	}
}