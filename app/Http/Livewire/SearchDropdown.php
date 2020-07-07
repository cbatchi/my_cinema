<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class SearchDropdown extends Component
{
    public $search;

    public function render()
    {
        $api_key = "?api_key=4d70e45657de52a76f077a3b931879b9";
        $api_lang_res = "&language=fr-FR";

        $searchResults = [];

        if (strlen($this->search) >= 2) {
            $searchResults = Http::get('https://api.themoviedb.org/3/search/movie'. $api_key . $api_lang_res .'&query=' . $this->search)
            ->json()['results'];

        }
        // dump($searchResults);

        return view('livewire.search-dropdown', [
            'searchResults' => collect($searchResults)->take(7)
        ]);
    }
}
