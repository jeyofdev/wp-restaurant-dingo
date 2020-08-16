<?php

namespace jeyofdev\wp\dingo\restaurant\inc;



/**
 * Class which manages the styles
 */
class Styles {

    /**
     * Load all styles
     *
     * @return void
     */
    public static function init () : void
    {
        self::remove_style_attr_to_widget_tag_cloud();
        self::remove_tag_p();
        self::contact_form_remove_span();
    }



    /**
     * Remove the style attribute on the links generated by the Tag Cloud widget
     *
     * @return void
     */
    public static function remove_style_attr_to_widget_tag_cloud () : void
    {
        add_filter("wp_tag_cloud", function ($args) {
            $args = str_replace('style="font-size: 22pt;" ', '', $args);
            $args = str_replace('style="font-size: 8pt;" ', '', $args);
            return $args;
        });
    }



    /**
     * Remove paragraphs add at the beginning and at the end of the content
     *
     * @return void
     */
    public static function remove_tag_p () : void
    {
        remove_filter("the_content", "wpautop");
    }



    /**
     * Contact form 7 remove span
     */
    public static function contact_form_remove_span () : void
    {
        add_filter("wpcf7_form_elements", function( string $content)
        {
            $content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);
            $content = str_replace('<br />', '', $content);
            $content = str_replace('<p>', '', $content);
            $content = str_replace('</p>', '', $content);

            return $content;
        });
    }
}