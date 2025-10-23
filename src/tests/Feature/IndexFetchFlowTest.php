<?php

namespace Tests\Feature;

use App\Models\Item;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IndexFetchFlowTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndex()
    {
        $items = Item::all();

        $response = $this->get('/');

        $response->assertViewHas('items', function ($viewItems) use ($items) {
            return $viewItems->count() === $items->count();
        });



        $item = Item::factory()->create([
            'name' => 'sold_item',
            'delivery_address_id' => 1,
        ]);
    }
}
