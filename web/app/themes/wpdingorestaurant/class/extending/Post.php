<?php

namespace jeyofdev\wp\dingo\restaurant\extending;

use \DateTime;
use Timber\Post as TimberPost;
use jeyofdev\wp\dingo\restaurant\inc\Pagination;
use jeyofdev\wp\dingo\restaurant\Helpers\DateHelpers;



/**
 * Class which manages the posts
 */
class Post extends TimberPost
{
    /**
     * @var DateTime
     */
    public $post_datetime;



    /**
     * @param mixed $pid
     */
    public function __construct ($pid = null)
    {
        parent::__construct($pid);
        Pagination::load();
    }



    /**
     * Format the date
     *
     * @return void
     */
    public function date_format () : string
    {
        DateHelpers::$current_date = DateHelpers::set_current_date();
        $this->post_datetime = $this->set_date_datetime();
        DateHelpers::$interval = DateHelpers::set_interval($this->post_datetime);

        $args = [
            "m" => sprintf( _n("%s Month ago", "%s Months ago", (int)DateHelpers::$interval->m, "dingo"), (int)DateHelpers::$interval->m),
            "d" => sprintf( _n("%s Day ago", "%s Days ago", (int)DateHelpers::$interval->d, "dingo"), (int)DateHelpers::$interval->d),
            "h" => sprintf( _n("%s Hour ago", "%s Hours ago", (int)DateHelpers::$interval->h, "dingo"), (int)DateHelpers::$interval->h),
            "i" => sprintf( _n("%s Minute ago", "%s Minutes ago", (int)DateHelpers::$interval->i, "dingo"), (int)DateHelpers::$interval->i),
            "s" => sprintf( _n("%s Seconde ago", "%s Secondes ago", (int)DateHelpers::$interval->s, "dingo"), (int)DateHelpers::$interval->s)
        ];

        if (DateHelpers::$interval->y >= 1) {
            $content = $this->get_date("F d, Y");
        } elseif ((DateHelpers::$interval->m > 0) && (DateHelpers::$interval->m <= 12)) {
            $content = $args["m"];
        } elseif ((DateHelpers::$interval->d > 0) && (DateHelpers::$interval->d <= 31)) {
            $content = $args["d"];
        } elseif ((DateHelpers::$interval->h > 0) && (DateHelpers::$interval->h <= 59)) {
            $content = $args["h"];
        } elseif ((DateHelpers::$interval->i > 0) && (DateHelpers::$interval->i <= 59)) {
            $content = $args["i"];
        } elseif ((DateHelpers::$interval->s > 0) && (DateHelpers::$interval->s <= 59)) {
            $content = $args["s"];
        }

        return $content;
    }



    /**
     * Set the datetime of the current post
     *
     * @param string $format
     * @return DateTime
     */
    public function set_date_datetime (?string $format = "Y-m-d H:i:s") : DateTime
    {
        return new DateTime($this->get_date($format), wp_timezone());
    }
}