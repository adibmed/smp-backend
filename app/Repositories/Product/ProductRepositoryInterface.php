<?php

namespace App\Repositories\Product;

use App\Models\Product;
use Illuminate\Support\Collection;

interface ProductRepositoryInterface
{
    /**
     * Return a collection of Products
     *
     * @return Collection
     */
    public function getAllProducts(): Collection;

    /**
     * Return a collection of Products with approved status
     *
     * @return Collection
     */
    public function getAllApprovedProducts(): Collection;

    /**
     * Create a new Product
     *
     * @return Product
     */
    public function createProduct(array $productDetails): Product;

    /**
     * Update a Product details
     *
     * @return Product
     */
    public function updateProduct($productId, array $productDetails): Product;

    /**
     * Remove a Product
     *
     */
    public function removeProduct($productId);
}
