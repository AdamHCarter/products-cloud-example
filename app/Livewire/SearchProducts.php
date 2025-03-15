<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Url;
use App\Models\Product;

class SearchProducts extends Component
{
    #[Url(history: true)]
    public $q = '';

    public function render()
    {
        if($this->q == '') {
            $products = [];
        } else {
            $products = Product::search($this->q)->get();
        }
        
        return view('livewire.search-products', ['products' => $products]); 
    }
}
