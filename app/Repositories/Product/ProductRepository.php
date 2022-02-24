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
        return Product::where('status', Product::APPROVED)->get();
    }

    public function approveProduct($productId): Product
    {
        return $this->updateProduct($productId, ['status' => Product::APPROVED]);
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
     * Update a Product details
     *
     * @return Product
     */
    public function updateProduct($productId, array $productDetails): Product
    {
        return Product::whereId($productId)->udpate($productDetails);
    }

    /**
     * Remove a Product
     *
     */
    public function removeProduct($productId)
    {
        Product::destroy($productId);
    }

}
