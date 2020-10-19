<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Repositories\ProductRepository;
use Cache;
use Illuminate\Http\Request;
use Log;

class ProductController extends Controller
{
    /**
     * Product Repository
     *
     * @var ProductRepository
     */
    private $productRepository;

    public function __construct(ProductRepository $productRepository) {
        $this->productRepository = $productRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->productRepository->paginate();

        // Example of how some basic caching could be implemented
        // $page = $request->input('page', 1);
        // return Cache::remember("products_$page", now()->addMinute(), function () {
        //     return $this->productRepository->paginate();
        // });
    }
}
