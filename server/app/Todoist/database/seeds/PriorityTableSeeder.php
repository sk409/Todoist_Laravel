<?php

use App\DDD\Domain\Priority\Priority;
use App\DDD\Domain\Priority\PriorityHex;
use App\DDD\Domain\Priority\PriorityName;
use App\DDD\Infrastructure\Priority\PriorityRepository;
use Illuminate\Database\Seeder;

class PriorityTableSeeder extends Seeder
{
    private $priorityRepository;

    public function __construct(PriorityRepository $priorityRepository)
    {
        $this->priorityRepository = $priorityRepository;
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
            $this->priorityRepository->save(Priority::create(
                PriorityHex::create($priority[1]),
                PriorityName::create($priority[0])
            ));
        }
    }
}
