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

    #[Url]
    public array $selected_brands = [];

    #[Url]
    public $featured;

    #[Url]
    public $on_sale;

    #[Url]
    public $price_range = 300000;

    public function render()
    {
        // dd($this->selected_categories);
        // dd($this->selected_brands);
        $productQuery = Product::query()->where('is_active', 1);
        if (!empty($this->selected_categories)) {
            $categories = is_array($this->selected_categories)
                ? $this->selected_categories
                : [$this->selected_categories];
            // Cast all values to int
            $categories = array_map('intval', $categories);
            $productQuery->whereIn('category_id', $categories);
        }

        // if (!empty($this->selected_brands)) {
        //     $productQuery->whereIn('brand_id', $this->selected_brands);
        // }
        if (!empty($this->selected_brands)) {
            $brands = is_array($this->selected_brands)
                ? $this->selected_brands
                : [$this->selected_brands];
            // Cast all values to int
            $brands = array_map('intval', $brands);
            $productQuery->whereIn('brand_id', $brands);
        }


        //Query the feature products
        if($this->featured) {
            $productQuery->where('is_featured', 1);
        } else {
            $productQuery->where('is_featured', 0);
        }
        
        //Query the on sale products
        if($this->on_sale) {
            $productQuery->where('on_sale', 1);
        } else {
            $productQuery->where('on_sale', 0);
        }

        //Query the price range
        if($this->price_range) {
            $productQuery->whereBetween('price', [0, $this->price_range]);
        }

        return view('livewire.product-page', [
            'products' => $productQuery->paginate(6),
            'brands' => Brand::where('is_active', 1)->get(['id', 'name', 'slug', 'image']),
            'categories' => Category::where('is_active', 1)->get(['id', 'name', 'slug', 'image']),

        ]);
    }
}
