<?php

namespace jeyofdev\wp\dingo\restaurant\Helpers;

use DateTime;
use DateInterval;
use DateTimeImmutable;



/**
 * Class which manages dates
 */
class DateHelpers
{
    /**
     * @var DateTimeImmutable
     */
    public static $current_date;



    /**
     * @var DateInterval
     */
    public static $interval;



    /**
     * Set the current date
     *
     * @return DateTimeImmutable
     */
    public static function set_current_date () : DateTimeImmutable
    {
        return current_datetime();
    }



    /**
     * Get the interval between the current date and a custom date
     *
     * @return DateInterval
     */
    public static function set_interval (DateTime $date) : DateInterval
    {
        return self::$current_date->diff($date);
    }
}