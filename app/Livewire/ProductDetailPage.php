<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Product Detail Nin-ja')]

class ProductDetailPage extends Component
{
    public $slug;

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function hydrate()
    {
        // $this->product = Product::where('slug', $this->slug)->firstOrFail();
    }
    public function render()
    {
        // 
        return view('livewire.product-detail-page', [
            'product' => Product::where('slug', $this->slug)->firstOrFail()
        ]);
    }
}
