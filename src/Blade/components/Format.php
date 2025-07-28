<?php

namespace Awtechs\DateHelper\Components;

use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Awtechs\DateHelper\DateHelper;

/**
 * Class Format
 *
 * Formats a date using a custom format string.
 *
 * Usage:
 * <x-date.format :value="$model->created_at" format="d M Y" />
 *
 * @package Awtechs\DateHelper\Components
 */
class Format extends Component
{
    /**
     * The date value to be formatted.
     *
     * @var string
     */
    public string $value;

    /**
     * The format string (e.g., 'Y-m-d', 'd M Y').
     *
     * @var string
     */
    public string $format;

    /**
     * Create the component instance.
     *
     * @param string $value
     * @param string $format
     */
    public function __construct(string $value, string $format = 'Y-m-d')
    {
        $this->value = $value;
        $this->format = $format;
    }

    /**
     * Get the view that represents the component.
     *
     * @return View
     */
    public function render(): View
    {
        $carbonDate = now()->setTimezone('UTC');

        try {
            $carbonDate = \Carbon\Carbon::parse($this->value)->setTimezone('Africa/Lagos');
        } catch (\Throwable $e) {
            // fallback to now
        }

        return view('date::date.format', [
            'output' => $carbonDate->format($this->format),
        ]);
    }
}
