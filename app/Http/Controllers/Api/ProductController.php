<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Resources\ProductResource;
use App\Http\Requests\ProductRequest;
use App\Rules\ProductExists;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $pageSize é o tamanho da página. 
        // $page para indicar qual página está sendo acessada pelo postman.Como padrão, deixei 1
        // $query e a consulta em ordem decrescente.
        // $products é a saída que manipulei para atender a regra de negócio/o que foi solicitado
        // $paginationproducts é o output final aplicando o json.

        $pageSize = 5; 
        $page = request()->query('page', 1);

        $query = Product::query()->orderBy('id', 'desc');
        $products = $query->paginate($pageSize, ['id', 'name', 'price', 'quantity', 'description'], 'page', $page);

        $paginationproducts = [
            'pagina_atual' => $products->currentPage(),
            'total_paginas' => $products->lastPage(),
            'total_registros' => $products->total(),
            'registros_por_pagina' => $pageSize,
            'registros' => ProductResource::collection($products),
        ];

        return response()->json($paginationproducts);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        //Cria produto e o retona caso atenda as validações
        $product = Product::create($request->all());
        
        return new ProductResource($product);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        // Se a validação passar, o produto existe, visualizo o produto específico/solicitado
        // Caso contrário, retorna mensagem de produto não encontrado com 404
        
        $product = new Product();

        $validateProduct = $product->get_product_by_id($request->product);
        if ($validateProduct) {
            return new ProductResource($validateProduct);
        }

        return response(['message' => 'Product not found.'], 404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        // Atualiza produto e o retona caso atenda as validações
        
        $product->update($request->all());
        
        return new ProductResource($product);
    }


    public function destroy(Request $request)
    {
        // Se a validação passar, o produto existe, removo e retorno 204
        // Caso contrário, retorna mensagem de produto não encontrado com 404

        $product = new Product();

        $validateProduct = $product->get_product_by_id($request->product);

        if ($validateProduct) {
            $product->delete();

            return response(null, 204);
        }
    
        return response(['message' => 'Product not found.'], 404);
    }
}
