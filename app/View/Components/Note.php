<?php

/**
 * https://laravel.com/docs/10.x/blade#rendering-components
 * Création de composante laravel
 */

namespace App\View\Components;

use Illuminate\View\Component;

class Note extends Component
{
    public $note;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($note)
    {
        $this->note = $note;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.note');
    }
}
