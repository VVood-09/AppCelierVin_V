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
        <div class="suggestion_scroll" x-data="{ query: '', results: [], search: function() {
            if (!this.query.trim()) {
                this.results = [];
                return;
            }
            axios.get('/autocomplete-search', { params: { q: this.query } })
                .then(response => { this.results = response.data })
                .catch(error => { console.log(error) });
        }, resetQuery: function() {
            this.query = '';
        } }" @reset-query.window="resetQuery">
            <input x-ref="autocompletefield" type="text" x-model="query" @input.debounce.300ms="search" placeholder="Rechercher un vin"/>
                <ul>
                    <template x-for="(result, index) in results" :key="index">
                        <li x-text="result.nom" 
                            @click= "
                            query = result.nom;
                                $refs.nom.textContent = result.nom;
                                $refs.prix.textContent = result.prix;
                                $refs.pays.textContent = result.pays;
                                $refs.type.textContent = result.type;
                                $refs.description.textContent = result.description;
                                $refs.format.textContent = result.format;


                                results = [];

                                ismodalopen = true;
                                    " 
                                value="result" ></li>
                    </template>
                </ul>
            </div>
        blade;
    }
}
