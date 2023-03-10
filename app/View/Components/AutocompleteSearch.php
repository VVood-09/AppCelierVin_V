<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AutocompleteSearch extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return <<<'blade'
            <div x-data="{ query: '', results: [], search: function() {
                if (!this.query.trim()) {
                    this.results = [];
                    return;
                }
                axios.get('/autocomplete-search', { params: { q: this.query } })
                    .then(response => { this.results = response.data })
                    .catch(error => { console.log(error) });
            }}">
                <input type="text" x-model="query" @input.debounce.300ms="search" />
                <ul>
                    <template x-for="(result, index) in results" :key="index">
                        <li x-text="result"></li>
                    </template>
                </ul>
            </div>
        blade;
    }
}
