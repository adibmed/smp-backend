<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Repositories\Product\ProductRepository;
use App\Repositories\Product\ProductRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

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
        // $this->middleware('auth:api');
        $this->productRepository = $productRepository;
    }


    /**
     * Get all products
     *
     * @return \Illuminate\Support\Collection
     */
    public function index():Collection
    {
        return $this->productRepository->getAllProducts();
    }

    /**
     * Get all approved products
     *
     * @return \Illuminate\Support\Collection
     */
    public function getApproved(): Collection
    {
        return $this->productRepository->getAllApprovedProducts();
    }

    /**
     * Approve a product
     *
     * @param $productId
     * @return JsonResponse
     */
    public function approve($productId): JsonResponse
    {
        if ($this->productRepository->approveProduct($productId)) {
            return response()->json([
                "message" => "Product approved successfully",
            ], 200);
        }
        else {
            return response()->json([
                "message" => "Something went wrong.",
                "description" => "Product approving failed."
            ], 500);
        }
    }

    /**
     * Find a product by id
     *
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        return $this->productRepository->findProductById($id);
    }

    /**
     * Store a product
     *
     * @return JsonResponse
     */
    public function store(ProductRequest $request): JsonResponse
    {
        if ($request->validated()) {
            if ($this->productRepository->createProduct($request->all())) return response()->json([
                "message" => "Product created successfully",
            ], 200);
        } else {
            return response()->json([
                "message" => "Something went wrong.",
                "description" => "Product creation failed."
            ], 500);
        }
    }


    /**
     * Update a product
     *
     * @param Product $product
     * @return JsonResponse
     */
    public function update(ProductRequest $productRequest):JsonResponse
    {
        if ($this->productRepository->updateProduct($productRequest->input('id'), $productRequest->all())) {
            return response()->json([
                "message" => "Product approved successfully",
            ], 200);
        }
        else {
            return response()->json([
                "message" => "Something went wrong.",
                "description" => "Product approving failed."
            ], 500);
        }
    }

    /**
     * Remove a product
     */
    public function delete()
    {

    }
}
