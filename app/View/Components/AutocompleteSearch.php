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
                <input x-ref="autocompletefield" type="text" x-model="query" @input.debounce.300ms="search" />
                <ul>
                    <template x-for="(result, index) in results" :key="index">
                        <li x-text="result.nom" 
                            @click= "
                                console.log(result)
                                $refs.nom.value = result.nom;
                                $refs.prix.value = result.prix;
                                $refs.pays.value = result.pays;
                                $refs.type.value = result.type;
                                $refs.description.value = result.description;
                                $refs.format.value = result.format;
                                $refs.autocompletefield.value = result.nom; 
                                results = [];
                                    " 
                                value="result" ></li>
                    </template>
                </ul>
            </div>
        blade;
    }
}
