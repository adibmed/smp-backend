<?php

namespace App\Repositories\Product;

use App\Models\Product;
use Illuminate\Support\Collection;

interface ProductRepositoryInterface
{
    public function getAllProducts(): Collection;

    public function getAllApprovedProducts(): Collection;

    public function createProduct(array $productDetails): Product;

    public function updateProduct($productId, array $productDetails): bool;

    public function removeProduct($productId);

    public function findProductById($id): Product;
}
