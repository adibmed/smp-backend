<?php

namespace App\Repositories\Product;

use App\Models\Product;
use Illuminate\Support\Collection;

interface ProductRepositoryInterface
{/**
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
     * Update product status to approved
     * @param $productId
     * @return bool
     */
    public function approveProduct($productId): bool;

    /**
     * Create a new Product
     *
     * @return Product
     */
    public function createProduct(array $productDetails): Product;

    /**
     * Update a Product details
     *
     * @return bool
     */
    public function updateProduct($productId, array $productDetails): bool;

    /**
     * Remove a Product
     */
    public function removeProduct($productId);
}
