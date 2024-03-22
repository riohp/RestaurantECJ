<?php
namespace App\Utils;

use App\Models\Table;
use App\Models\Product;
use App\Models\Category;
use App\Models\TableProduct;
use App\Models\DeliveryProduct;
use App\Models\Delivery;
use App\Models\Cooking;
use App\Models\CookingCategory;

class ShowDataInvoice
{
    public static function showDataInvoice($cookingId)
    {
        $cooking = Cooking::find($cookingId);
        $cookingCategories = CookingCategory::where('cooking_id', $cookingId)->pluck('category_id');
    
        $products = TableProduct::where('status', 'cooking')
            ->whereHas('product.categories', function ($query) use ($cookingCategories) {
                $query->whereIn('id', $cookingCategories);
            })
            ->with('table')
            ->with('product') 
            ->get();

        $products_delivery = DeliveryProduct::where('status', 'cooking')
            ->whereHas('product.categories', function ($query) use ($cookingCategories) {
                $query->whereIn('id', $cookingCategories);
            })
            ->with('delivery')
            ->with('product') 
            ->get();
        return view('cooking.show', compact('cooking', 'products', 'products_delivery'));
    }

}
