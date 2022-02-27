<?php

namespace App\Repositories\Product;

use App\Models\Product;
use Illuminate\Support\Collection;

class ProductRepository implements ProductRepositoryInterface
{


    /**
     * Return a collection of Products
     *
     * @return Collection
     */
    public function getAllProducts(): Collection
    {
        return Product::all();
    }

    /**
     * Return a collection of Products with approved status
     *
     * @return Collection
     */
    public function getAllApprovedProducts(): Collection
    {
        return Product::where('approved', true)->get();
    }


    /**
     * Create a new Product
     *
     * @return Product
     */
    public function createProduct(array $productDetails): Product
    {
        return Product::create($productDetails);
    }

    /**
     * Find a product by id
     *
     * @param $id
     * @return Product
     */
    public function findProductById($id): Product
    {
        return Product::find($id);
    }

    /**
     * Update a Product details
     *
     * @return bool
     */
    public function updateProduct($productId, array $productDetails): bool
    {
        return Product::find($productId)->update($productDetails);
    }

    /**
     * Remove a Product
     */
    public function removeProduct($productId)
    {
    }

}
