<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Giria;

class giriaCard extends Component
{

    /**
     * O objeto gíria
     *
     * @var collection
     */
    public $giria;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($giria)
    {
        $this->giria = $giria;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.giria-card');
    }
}
