<?php

namespace Awtechs\DateHelper\Components;

use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Awtechs\DateHelper\DateHelper;

/**
 * Class Human
 *
 * Renders a human-readable date difference.
 *
 * Usage:
 * <x-date.human :value="$model->created_at" />
 *
 * @package Awtechs\DateHelper\Components
 */
class Human extends Component
{
    /**
     * The date value to be rendered.
     *
     * @var string
     */
    public string $value;

    /**
     * Create the component instance.
     *
     * @param string $value
     */
    public function __construct(string $value)
    {
        $this->value = $value;
    }

    /**
     * Get the view that represents the component.
     *
     * @return View
     */
    public function render(): View
    {
        return view('date::date.human', [
            'output' => DateHelper::humanDiff($this->value),
        ]);
    }
}
