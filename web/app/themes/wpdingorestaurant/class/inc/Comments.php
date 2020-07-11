<?php

namespace jeyofdev\wp\dingo\restaurant\inc;



/**
 * Class that manages comments and the form for adding comments
 */
class Comments {

    /**
     * Filters the default comment form fields
     *
     * @return void
     */
    public static function comment_form_default_fields () : void
    {
        add_filter("comment_form_default_fields", function (array $fields)
        {
            $authorLabel = __("Name *", "dingo");
            $emailLabel = __("Email *", "dingo");
            $urlLabel = __("Website", "dingo");

            $fields['author'] = 
                '<div class="col-sm-6">
                    <div class="form-group">
                        <input type="text" class="form-control" name="author" id="author" placeholder="' . $authorLabel . '" required>
                    </div>
                </div>'
            ;

            $fields['email'] = 
                '<div class="col-sm-6">
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" id="email" placeholder="' . $emailLabel . '" required>
                    </div>
                </div>'
            ;

            $fields['url'] = 
                '<div class="col-12">
                    <div class="form-group">
                        <input type="url" class="form-control" name="url" id="url" placeholder="' . $urlLabel . '">
                    </div>
                </div>'
            ;

            $fields['cookies'] = '';

            return $fields;
        });
    }



    /**
     * Filters the comment form default arguments
     *
     * @return void
     */
    public static function comment_form_defaults () : void
    {
        add_filter("comment_form_defaults", function (array $fields)
        {
            $commentLabel = __("Write Comment *", "dingo");

            $user = wp_get_current_user();
            $user_identity = $user->exists() ? $user->display_name : '';

            $fields["title_reply_before"] = '<h4>';
            $fields["title_reply_after"] = "</h4>";
            $fields["title_reply"] = __("Leave a Reply", "dingo");
            $fields["class_form"] = "d-flex flex-wrap form-contact comment_form";
            $fields["comment_field"] = 
                '<div class="col-12">
                    <div class="form-group">
                        <textarea class="form-control w-100" id="comment" name="comment" cols="30" rows="9" placeholder="' . $commentLabel . '" required></textarea>
                    </div>
                </div>'
            ;
            $fields["class_submit"] = "button button-contactForm";
            $fields["label_submit"] = __("Send Message", "dingo");
            $fields["submit_button"] = '<input name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s" /></div>';
            $fields["submit_field"] = '<div class="form-group">%1$s %2$s</div>';

            return $fields;
        });
    }



    /**
     * Change the class attribute of the comment reply link
     *
     * @return void
     */
    public static function comment_reply_link () : void
    {
        add_filter("comment_reply_link", function ($class){
            $class = str_replace("class='comment-reply-link", 'class="comment-reply-link btn-reply text-uppercase"', $class);

            return $class;
        });
    }
}