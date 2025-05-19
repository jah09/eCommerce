<?php

namespace App\Livewire;

use App\Models\Brand;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\Url;
use Livewire\Attributes\Title;

#[Title('Product Page Nin-ja')]
class ProductPage extends Component
{
    use \Livewire\WithPagination;
    #[Url]
    public array $selected_categories = [];
    public array $selected_brands = [];

    public function render()
    {
        // dd($this->selected_categories);

        $productQuery = Product::query()->where('is_active', 1);
        if (!empty($this->selected_categories)) {
            $productQuery->whereIn('category_id', $this->selected_categories);
        }

        if (!empty($this->selected_brands)) {
            $productQuery->whereIn('brand_id', $this->selected_brands);
        }

        return view('livewire.product-page', [
            'products' => $productQuery->paginate(6),
            'brands' => Brand::where('is_active', 1)->get(['id', 'name', 'slug', 'image']),
            'categories' => Category::where('is_active', 1)->get(['id', 'name', 'slug', 'image']),

        ]);
    }
}
