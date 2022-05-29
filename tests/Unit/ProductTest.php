<?php

namespace Tests\Unit;

use App\Models\Product;
use Tests\TestCase;

class ProductTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }

    public function testGetAllProducts(){
        $response = $this->getJson('/api/v1/products');

        //$response->dump();

        $response->assertStatus(200);
    }

    public function testCreate(){
        $time = time();

        $data = [
            'name' => 'Create a product via API call __'.$time ,
            'description' => 'Created product description __'.$time ,
        ];

        $response = $this->postJson("/api/v1/product", $data);


        //$response->dump();

        $response->assertStatus(200)
            ->assertJson($data);
    }

    public function testEdit(){

        $product = Product::factory()->create();

        $time = time();

        $data = [
            'name' => 'Update a product via API call __'.$time ,
            'description' => 'Updated product description __'.$time ,
        ];

        $response = $this->putJson("/api/v1/product/".$product->id, $data);


        //$response->dump();

        $response->assertStatus(200)
            ->assertJson($data);
    }

    public function testShow(){

        $product = Product::factory()->create();

        $data = [
            'name' => $product->name,
            'description' => $product->description,
        ];

        $response = $this->getJson("/api/v1/product/".$product->id);


        //$response->dump();

        $response->assertStatus(200)
            ->assertJson($data);
    }

    public function testDelete(){

        $product = Product::factory()->create();

        $response = $this->deleteJson("/api/v1/product/".$product->id);

       // $response->dump();

        $response->assertStatus(200)
            ->assertJson([
                'deleted' => true,
            ]);
    }
}
