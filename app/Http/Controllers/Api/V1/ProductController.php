<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Repositories\Product\ProductRepository;
use App\Repositories\Product\ProductRepositoryInterface;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * @var  ProductRepository
     */
    protected $productRepository;

    /**
     * Repository injection
     * @param ProductRepositoryInterface $productRepository
     */
    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }


    public function index()
    {
        return $this->productRepository->getAllApprovedProducts();
    }

    public function store()
    {

    }

    public function udpate()
    {

    }

    public function delete()
    {

    }
}
