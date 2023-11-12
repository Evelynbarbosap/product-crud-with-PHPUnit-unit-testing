<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Product;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Response;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;

class ProductControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_get_list_products()
    {
        //Chamo o serviço de listagem e valido se o status é 200

        $response = $this->getJson(route('products.index'));

        $response->assertStatus(200);
    }

    public function test_post_product()
    {
        // Crio um produto
        // Faço validação para saber se o produto foi criado no banco corretamente.


        $product = Product::create([
            'name' => 'Fone de ouvido',
            'price' => 59.9,
            'quantity' => 150,
            'description' => 'Solicitação de HeadSets para vendas de fim de ano.',
        ]);
        
        $this->assertDatabaseHas('products', [
            'name' => 'Fone de ouvido',
            'price' => 59.9,
            'quantity' => 150,
            'description' => 'Solicitação de HeadSets para vendas de fim de ano.',
        ]);
        
    }

    public function test_get_show_products()
    {
        // Crio um produto para pegar os detalhes dele
        // Chamo o serviço de detalhes desse produto criado.
        // Checo se o serviço retornou 200
        // Checo se a resposta tem os detalhes do produto 

        $product = Product::create([
            'name' => 'Esmalte de unha.',
            'price' => 2.99,
            'quantity' => 200,
            'description' => 'Solicitação de esmaltes para vendas de fim de ano.',
        ]);
        
        $response = $this->getJson(route('products.show', ['product' => $product->id]));
    
        $response->assertStatus(200);
    
        $response->assertJson([
            'data' => [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $product->quantity,
                'description' => $product->description
            ]
        ]);
    }
    
    public function test_update_product()
    {
        // Crio um produto de teste e chamo o serviço de update para atualizar o produto criado
        // Faço uma solicitação do serviço de update passando como paramtro o produto criado
        // Vejo se a resposta é do tipo json e se retorna 200, depois vejo se contém os dados já atualizados e o mesmo no BD.

        $newProduct =  Product::create([
            'name' => 'Calça Jeans.',
            'price' => 72.99,
            'quantity' => 90,
            'description' => 'Solicitação de calças femininas para vendas de fim de ano.',
        ]);
        
        $response = $this->putJson(route('products.update', ['product' => $newProduct->id]), [
            'name' => 'Calça Jeans feminina',
            'price' => 72.99,
            'quantity' => 90,
            'description' => 'Solicitação de calças femininas para vendas de fim de ano.'
        ]);

        $response->assertStatus(200);

        $response->assertJson([
            'data' => [
                'id' => $newProduct->id,
                'name' => 'Calça Jeans feminina',
                'price' => 72.99,
                'quantity' => 90,
                'description' => 'Solicitação de calças femininas para vendas de fim de ano.'
            ],
        ]);

        $this->assertDatabaseHas('products', [
            'id' => $newProduct->id,
            'name' => 'Calça Jeans feminina',
            'price' => 72.99,
            'quantity' => 90,
            'description' => 'Solicitação de calças femininas para vendas de fim de ano.'
        ]);
    }

    public function test_destroy_products()
    {
        // Crio um produto para ser excluído
        // Solicito o serviço para remover o produto criado
        // verifico se retorna 204


        $product = Product::create([
            'name' => 'Calça Jeans masculino.',
            'price' => 72.99,
            'quantity' => 90,
            'description' => 'Solicitação de calças para vendas de fim de ano.'
        ]);

        $response = $this->delete(route('products.destroy', ['product' => $product->id]));

        $response->assertStatus(204);

    }

}
