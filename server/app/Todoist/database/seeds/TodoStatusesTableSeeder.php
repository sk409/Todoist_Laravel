<?php

use App\DDD\Domain\TodoStatus\TodoStatus;
use App\DDD\Domain\TodoStatus\TodoStatusState;
use App\DDD\Infrastructure\TodoStatus\TodoStatusRepository;
use Illuminate\Database\Seeder;

class TodoStatusesTableSeeder extends Seeder
{

    /** @var TodoStatusRepository */
    private $todoStatusRepository;

    public function __construct(TodoStatusRepository $todoStatusRepository)
    {
        $this->todoStatusRepository = $todoStatusRepository;
    }


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $states = TodoStatusState::all();
        foreach ($states as $state) {
            $this->todoStatusRepository->save(TodoStatus::create($state));
        }
    }
}
