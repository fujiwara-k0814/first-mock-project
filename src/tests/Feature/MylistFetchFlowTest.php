<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Database\Seeders\CategoriesTableSeeder;
use Database\Seeders\ConditionsTableSeeder;
use Database\Seeders\ItemsTableSeeder;
use App\Models\Item;
use App\Models\User;
use App\Models\Like;

class MylistFetchFlowTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testUserMylistLikedItemsAreDisplayed()
    {
        /** @var \App\Models\User $user */
        //初期登録処理
        $user = User::factory()->create([
            'email_verified_at' => now(),
            'postal_code' => '123-4567',
            'address' => 'address',
        ]);

        $this->seed(CategoriesTableSeeder::class);
        $this->seed(ConditionsTableSeeder::class);
        $this->seed(ItemsTableSeeder::class);

        $item = Item::find(1);

        Like::create(['user_id' => $user->id,'item_id' => $item->id,]);

        $this->actingAs($user)->get('/?tab=mylist')->assertSee($item->name);
    }


    public function testUserMylistPurchasedItemsAreDisplayedSold()
    {
        /** @var \App\Models\User $user */
        //初期登録処理　DeliveryAddress付与
        $user = User::factory()->create([
            'email_verified_at' => now(),
            'postal_code' => '123-4567',
            'address' => 'address',
        ]);

        $this->seed(CategoriesTableSeeder::class);
        $this->seed(ConditionsTableSeeder::class);
        $this->seed(ItemsTableSeeder::class);

        $item = Item::find(1);

        $item->update(['delivery_address_id' => 1]);

        Like::create(['user_id' => $user->id,'item_id' => $item->id,]);

        $this->actingAs($user)->get('/?tab=mylist')->assertSee('Sold');
    }


    public function testGuestMylistItemsAreNotDisplayed()
    {
        $this->seed(CategoriesTableSeeder::class);
        $this->seed(ConditionsTableSeeder::class);
        $this->seed(ItemsTableSeeder::class);

        $items = Item::pluck('name')->all();

        $this->get('/?tab=mylist')->assertDontSee($items);
    }
}
