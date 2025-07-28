<?php

namespace Awtechs\DateHelper;

use Carbon\Carbon;

/**
 * Class DateHelper
 *
 * A timezone-aware, business-week-friendly date utility class built on Carbon.
 *
 * @package Awtechs\DateHelper
 */
class DateHelper
{
    /**
     * Default timezone used for all Carbon instances.
     *
     * @var string
     */
    protected static string $timezone = 'Africa/Lagos';

    /**
     * Returns a Carbon instance using the default timezone.
     *
     * @param string|null $date Optional date string.
     * @return Carbon
     */
    protected static function carbon(?string $date = null): Carbon
    {
        return $date
            ? Carbon::parse($date)->setTimezone(self::$timezone)
            : Carbon::now(self::$timezone);
    }

    /**
     * Get the current datetime.
     *
     * @return Carbon
     */
    public static function now(): Carbon
    {
        return self::carbon();
    }

    /**
     * Get the start of today.
     *
     * @return Carbon
     */
    public static function today(): Carbon
    {
        return self::carbon()->startOfDay();
    }

    /**
     * Get the start of yesterday.
     *
     * @return Carbon
     */
    public static function yesterday(): Carbon
    {
        return self::carbon()->subDay()->startOfDay();
    }

    /**
     * Get the start of tomorrow.
     *
     * @return Carbon
     */
    public static function tomorrow(): Carbon
    {
        return self::carbon()->addDay()->startOfDay();
    }

    /**
     * Get the start of the current business week (Monday).
     *
     * @return Carbon
     */
    public static function startOfBusinessWeek(): Carbon
    {
        return self::carbon()->startOfWeek(); // Monday
    }

    /**
     * Get the end of the business week (Friday end of day).
     *
     * @return Carbon
     */
    public static function endOfBusinessWeek(): Carbon
    {
        return self::carbon()->startOfWeek()->addDays(4)->endOfDay(); // Friday
    }

    /**
     * Subtract days from now.
     *
     * @param int $days
     * @return Carbon
     */
    public static function daysAgo(int $days): Carbon
    {
        return self::carbon()->subDays($days);
    }

    /**
     * Add days to now.
     *
     * @param int $days
     * @return Carbon
     */
    public static function daysFromNow(int $days): Carbon
    {
        return self::carbon()->addDays($days);
    }

    /**
     * Get the human-readable difference from now.
     *
     * @param string $date
     * @return string
     */
    public static function humanDiff(string $date): string
    {
        return self::carbon($date)->diffForHumans();
    }

    /**
     * Get plain date string (Y-m-d).
     *
     * @param string $date
     * @return string
     */
    public static function toDateString(string $date): string
    {
        return self::carbon($date)->toDateString();
    }

    /**
     * Get full datetime string (Y-m-d H:i:s).
     *
     * @param string $date
     * @return string
     */
    public static function toDateTimeString(string $date): string
    {
        return self::carbon($date)->toDateTimeString();
    }

    /**
     * Check if a date is on the weekend (Saturday or Sunday).
     *
     * @param string $date
     * @return bool
     */
    public static function isWeekend(string $date): bool
    {
        return self::carbon($date)->isWeekend();
    }

    /**
     * Check if a date is a business day (Monday to Friday).
     *
     * @param string $date
     * @return bool
     */
    public static function isBusinessDay(string $date): bool
    {
        return !self::isWeekend($date);
    }

    /**
     * Check if a date is today.
     *
     * @param string $date
     * @return bool
     */
    public static function isToday(string $date): bool
    {
        return self::carbon($date)->isToday();
    }

    /**
     * Check if a date is between two other dates.
     *
     * @param string $date
     * @param string $start
     * @param string $end
     * @return bool
     */
    public static function between(string $date, string $start, string $end): bool
    {
        return self::carbon($date)->between(
            self::carbon($start),
            self::carbon($end)
        );
    }

    /**
     * Get the difference in days between two dates.
     *
     * @param string $from
     * @param string $to
     * @return int
     */
    public static function diffInDays(string $from, string $to): int
    {
        return self::carbon($from)->diffInDays(self::carbon($to));
    }
}
