<?php

namespace App\Console\Commands;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Console\Command;

class ProductCategorySlug extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'product:category {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Return a symbolic category code for a product by id';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $id = $this->argument('id');
        $product = Product::find($id);
        if (!$product) {
            $this->error("ERROR: product with {$id} wasn't found");
        } else {
            $code = $product->category_id;
            $category = Category::find($code);
            $categoryCode = $category->slug;
            $this->info("The symbolic code of the product category is {$categoryCode}");
        }
    }
} 
