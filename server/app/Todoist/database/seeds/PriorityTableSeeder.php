<?php

use App\Services\PriorityService;
use Illuminate\Database\Seeder;

class PriorityTableSeeder extends Seeder
{

    private $priorityService;

    public function __construct(PriorityService $priorityService)
    {
        $this->priorityService = $priorityService;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $priorityList = [
            ["4", "808080"],
            ["3", "246FE0"],
            ["2", "EB8909"],
            ["1", "D1453B"]
        ];
        foreach ($priorityList as $priority) {
            $this->priorityService->create([
                "name" => $priority[0],
                "hex" => $priority[1]
            ]);
        }
    }
}
