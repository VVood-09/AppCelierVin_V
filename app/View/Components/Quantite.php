<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Quantite extends Component
{
    public $bouteille;
    public $cellier;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($bouteille, $cellier)
    {
        $this->bouteille = $bouteille;
        $this->cellier = $cellier;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.quantite');
    }
}
