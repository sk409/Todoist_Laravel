<?php

use App\Color;
use Illuminate\Database\Seeder;

class ColorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $colors = [
            ["ベリーレッド", "b8255f"],
            ["赤", "db4035"],
            ["オレンジ", "ff9933"],
            ["黄色", "fad000"],
            ["オリーブグリーン", "afb83b"],
            ["ライムグリーン", "7ecc49"],
            ["緑", "299438"],
            ["ミントグリーン", "6accbc"],
            ["ティール", "1890ae"],
            ["チャコール", "808080"]
        ];
        foreach ($colors as $color) {
            Color::create(["name" => $color[0], "hex" => $color[1]]);
        }
    }
}
