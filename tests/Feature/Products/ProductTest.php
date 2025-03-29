<?php

namespace Tests\Feature\Products;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    public function test_products_can_be_indexed()
    {
        Product::factory()->count(3)->create();

        $response = $this->getJson('/api/products');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'success',
                'data' => [
                    '*' => ['id', 'category_id', 'sku', 'name', 'price', 'created_at', 'updated_at']
                ]
            ]);
    }

    public function test_product_can_be_shown()
    {
        $product = Product::factory()->create();

        $response = $this->getJson('/api/products/' . $product->id);

        $response->assertStatus(200)
            ->assertJson([
                'success' => true,
                'data' => [
                    'id' => $product->id,
                    'category_id' => $product->category_id,
                    'sku' => $product->sku,
                    'name' => $product->name,
                    'price' => (string) $product->price
                ]
            ]);
    }

    public function test_product_can_be_stored()
    {
        $category = Category::factory()->create();

        $productData = [
            'category_id' => $category->id,
            'sku' => 'TEST001',
            'name' => 'Test Product',
            'price' => 99.99
        ];

        $response = $this->postJson('/api/products', $productData);

        $response->assertStatus(201)
            ->assertJson([
                'success' => true,
                'data' => [
                    'category_id' => $category->id,
                    'sku' => 'TEST001',
                    'name' => 'Test Product',
                    'price' => '99.99'
                ]
            ]);

        $this->assertDatabaseHas('products', $productData);
    }

    public function test_product_can_be_updated()
    {
        $product = Product::factory()->create();
        $newCategory = Category::factory()->create();

        $updatedData = [
            'category_id' => $newCategory->id,
            'name' => 'Updated Product Name',
            'price' => 149.99
        ];

        $response = $this->putJson('/api/products/' . $product->id, $updatedData);

        $response->assertStatus(200)
            ->assertJson([
                'success' => true,
                'data' => [
                    'id' => $product->id,
                    'category_id' => $newCategory->id,
                    'name' => 'Updated Product Name',
                    'price' => '149.99'
                ]
            ]);

        $this->assertDatabaseHas('products', array_merge(
            ['id' => $product->id],
            $updatedData
        ));
    }

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
