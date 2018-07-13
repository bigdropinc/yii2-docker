<?php
/**
 * Created by PhpStorm.
 * User: bigdrop
 * Date: 22.06.17
 * Time: 18:04
 */

namespace common\helpers;

/**
 * Class DateHelper
 *
 * @package common\helpers
 */
class DateHelper
{
    /**
     * @param string $date
     * @param string $format
     * @param string $timeZone
     *
     * @return string
     */
    public static function format($date = 'now', $format = "Y-m-d H:i:s", $timeZone = 'UTC')
    {
        $format = is_null($format) ? 'Y-m-d H:i:s' : $format;
        $date = self::getDate($date, $timeZone);

        return $date->format($format);
    }

    /**
     * @param string $interval
     * @param string $date
     * @param string $format
     * @param string $timeZone
     * @return string
     */
    public static function addDate($interval, $date = 'now', $format = "Y-m-d H:i:s", $timeZone = 'UTC')
    {
        $format = is_null($format) ? 'Y-m-d H:i:s' : $format;
        $date = self::getDate($date, $timeZone);
        $date->add(new \DateInterval($interval));

        return $date->format($format);
    }

    /**
     * @param $date string
     * @param $date2 string
     * @return string
     */
    public static function getDifferenceInMonths($date, $date2 = 'now')
    {
        $dateObj = self::getDate($date);
        $dateObj2 = self::getDate($date2);

        $interval = $dateObj2->diff($dateObj);

        return $interval->m + ($interval->y * 12);
    }

    /**
     * @param string $date
     * @param string $timeZone
     * @return \DateTime
     */
    public static function getDate($date = 'now', $timeZone = 'UTC')
    {
        $date = is_null($date) ? 'now' : $date;
        $timeZone = is_null($timeZone) ? 'UTC' : $timeZone;

        return new \DateTime($date, new \DateTimeZone($timeZone));
    }

    /**
     * @param string $date
     * @return string
     */
    public static function formatForGrid($date = 'now')
    {
        return static::format($date, 'm/d/Y h:i A');
    }

    /**
     * @param string $date
     * @param string $fromFormat
     * @param string $toFormat
     * @return string
     */
    public static function reformat($date = 'now', $fromFormat = 'm/d/Y', $toFormat = 'Y-m-d')
    {
        $date = \DateTime::createFromFormat($fromFormat, $date);

        if (!$date) {
            return false;
        }

        return $date->format($toFormat);
    }
}
