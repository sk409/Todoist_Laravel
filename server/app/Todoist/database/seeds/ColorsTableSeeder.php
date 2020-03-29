<?php

use App\DDD\Domain\Color\Color;
use App\DDD\Domain\Color\ColorHex;
use App\DDD\Domain\Color\ColorName;
use App\DDD\Infrastructure\Color\ColorRepository;
use Illuminate\Database\Seeder;

class ColorsTableSeeder extends Seeder
{
    private $colorRepository;

    public function __construct(ColorRepository $colorRepository)
    {
        $this->colorRepository = $colorRepository;
    }

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
            $this->colorRepository->save(Color::create(ColorHex::create($color[1]), ColorName::create($color[0])));
        }
    }
}
