<?php

use App\DDD\Domain\TodoStatus\TodoStatusState;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTodoStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('todo_statuses', function (Blueprint $table) {
            $table->increments('id');
            $table->string("state", TodoStatusState::MAX_LENGTH);
            $table->timestamps();
            $table->unique("state");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('todo_statuses');
    }
}
