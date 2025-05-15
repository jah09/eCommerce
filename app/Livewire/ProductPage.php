<?php

namespace App\Livewire;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Product Page Nin-ja')]
class ProductPage extends Component
{
    use \Livewire\WithPagination;

    public function render()
    {
        $productQuery = Product::query()->where('is_active', 1)->paginate(4);

        return view('livewire.product-page', [
            'products' => $productQuery,
            'brands' => Brand::where('is_active', 1)->get(['id', 'name', 'slug', 'image']),
            'categories' => Category::where('is_active', 1)->get(['id', 'name', 'slug', 'image']),

        ]);
    }
}
