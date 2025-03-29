<?php

namespace Tests\Feature\Products;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test products index endpoint.
     *
     * @return void
     */
    public function test_products_can_be_indexed()
    {
        Product::factory()->count(3)->create();

        $response = $this->getJson('/api/products');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'success',
                'data' => [
                    '*' => ['id', 'sku', 'name', 'price', 'created_at', 'updated_at']
                ]
            ]);
    }

    /**
     * Test product show endpoint.
     *
     * @return void
     */
    public function test_product_can_be_shown()
    {
        $product = Product::factory()->create();

        $response = $this->getJson('/api/products/' . $product->id);

        $response->assertStatus(200)
            ->assertJson([
                'success' => true,
                'data' => [
                    'id' => $product->id,
                    'sku' => $product->sku,
                    'name' => $product->name,
                    'price' => (string) $product->price
                ]
            ]);
    }

    /**
     * Test product store endpoint.
     *
     * @return void
     */
    public function test_product_can_be_stored()
    {
        $productData = [
            'sku' => 'TEST001',
            'name' => 'Test Product',
            'price' => 99.99
        ];

        $response = $this->postJson('/api/products', $productData);

        $response->assertStatus(201)
            ->assertJson([
                'success' => true,
                'data' => [
                    'sku' => 'TEST001',
                    'name' => 'Test Product',
                    'price' => '99.990'
                ]
            ]);

        $this->assertDatabaseHas('products', $productData);
    }

    /**
     * Test product update endpoint.
     *
     * @return void
     */
    public function test_product_can_be_updated()
    {
        $product = Product::factory()->create();

        $updatedData = [
            'name' => 'Updated Product Name',
            'price' => 149.99
        ];

        $response = $this->putJson('/api/products/' . $product->id, $updatedData);

        $response->assertStatus(200)
            ->assertJson([
                'success' => true,
                'data' => [
                    'id' => $product->id,
                    'name' => 'Updated Product Name',
                    'price' => '149.990'
                ]
            ]);

        $this->assertDatabaseHas('products', [
            'id' => $product->id,
            'name' => 'Updated Product Name',
            'price' => 149.99
        ]);
    }

    /**
     * Test product destroy endpoint.
     *
     * @return void
     */
    public function test_product_can_be_destroyed()
    {
        $product = Product::factory()->create();

        $response = $this->deleteJson('/api/products/' . $product->id);

        $response->assertStatus(200)
            ->assertJson([
                'success' => true,
                'message' => 'Product deleted successfully'
            ]);

        $this->assertDatabaseMissing('products', [
            'id' => $product->id
        ]);
    }
}
