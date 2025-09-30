<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Item;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            [
                'image_path' => 'storage/Armani+Mens+Clock.jpg', 
                'name' => '腕時計', 
                'brand' => 'Rolax',
                'price' => '15000',
                'description' => 'スタイリッシュなデザインのメンズ腕時計', 
                'condition' => '1',
                'categories' => [1, 5, 12],
            ],
            [
                'image_path' => 'storage/HDD+Hard+Disk.jpg',
                'name' => 'HDD',
                'brand' => '西芝',
                'price' => '5000',
                'description' => '高速で信頼性の高いハードディスク',
                'condition' => '2',
                'categories' => [2],
            ],
            [
                'image_path' => 'storage/iLoveIMG+d.jpg',
                'name' => '玉ねぎ3束',
                'brand' => '',
                'price' => '300',
                'description' => '新鮮な玉ねぎ3束のセット',
                'condition' => '3',
                'categories' => [10],
            ],
            [
                'image_path' => 'storage/Leather+Shoes+Product+Photo.jpg',
                'name' => '革靴',
                'brand' => '',
                'price' => '4000',
                'description' => 'クラシックなデザインの革靴',
                'condition' => '4',
                'categories' => [1, 5],
            ],
            [
                'image_path' => 'storage/Living+Room+Laptop.jpg',
                'name' => 'ノートPC',
                'brand' => '',
                'price' => '45000',
                'description' => '高性能なノートパソコン',
                'condition' => '1',
                'categories' => [2],
            ],
            [
                'image_path' => 'storage/Music+Mic+4632231.jpg',
                'name' => 'マイク',
                'brand' => '',
                'price' => '8000',
                'description' => '高音質のレコーディング用マイク',
                'condition' => '2',
                'categories' => [2],
            ],
            [
                'image_path' => 'storage/Purse+fashion+pocket.jpg',
                'name' => 'ショルダーバッグ',
                'brand' => '',
                'price' => '3500',
                'description' => 'おしゃれなショルダーバッグ',
                'condition' => '3',
                'categories' => [1, 4],
            ],
            [
                'image_path' => 'storage/Tumbler+souvenir.jpg',
                'name' => 'タンブラー',
                'brand' => '',
                'price' => '500',
                'description' => '使いやすいタンブラー',
                'condition' => '4',
                'categories' => [10],
            ],
            [
                'image_path' => 'storage/Waitress+with+Coffee+Grinder.jpg',
                'name' => 'コーヒーミル',
                'brand' => 'Starbacks',
                'price' => '4000',
                'description' => '手動のコーヒーミル',
                'condition' => '1',
                'categories' => [10],
            ],
            [
                'image_path' => 'storage/外出メイクアップセット.jpg',
                'name' => 'メイクセット',
                'brand' => '',
                'price' => '2500',
                'description' => '便利なメイクアップセット',
                'condition' => '2',
                'categories' => [1, 4, 6],
            ],
        ];

        foreach ($items as $itemDefinition) {
            $categoryIds = $itemDefinition['categories'];
            unset($itemDefinition['categories']);

            $item = Item::create($itemDefinition);
            $item->categories()->sync($categoryIds);
        }
    }
}
