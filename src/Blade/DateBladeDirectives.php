<?php

namespace Awtechs\DateHelper\Blade;

use Illuminate\Support\Facades\Blade;
use Awtechs\DateHelper\DateHelper;

/**
 * Class DateBladeDirectives
 *
 * Registers custom Blade directives for date formatting and checks.
 *
 * @package Awtechs\DateHelper\Blade
 */
class DateBladeDirectives
{
    /**
     * Register all custom Blade directives.
     *
     * @return void
     */
    public static function register(): void
    {
        // Human-readable difference from now (e.g. "2 days ago")
        Blade::directive('humanDate', function ($expression) {
            return "<?php echo \Awtechs\DateHelper\DateHelper::humanDiff($expression); ?>";
        });

        // Full datetime string (Y-m-d H:i:s)
        Blade::directive('dateTime', function ($expression) {
            return "<?php echo \Awtechs\DateHelper\DateHelper::toDateTimeString($expression); ?>";
        });

        // Plain date (Y-m-d)
        Blade::directive('dateOnly', function ($expression) {
            return "<?php echo \Awtechs\DateHelper\DateHelper::toDateString($expression); ?>";
        });

        // If the date is on a weekend
        Blade::directive('isWeekend', function ($expression) {
            return "<?php if (\Awtechs\DateHelper\DateHelper::isWeekend($expression)) : ?>";
        });

        Blade::directive('endisWeekend', function () {
            return "<?php endif; ?>";
        });

        // If the date is today
        Blade::directive('isToday', function ($expression) {
            return "<?php if (\Awtechs\DateHelper\DateHelper::isToday($expression)) : ?>";
        });

        Blade::directive('endisToday', function () {
            return "<?php endif; ?>";
        });
    }
}
