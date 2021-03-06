<?php

use App\DDD\Domain\Todo\TodoContent;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTodosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('todos', function (Blueprint $table) {
            $table->increments('id');
            $table->date("completed_at")->nullable();
            $table->string("content", TodoContent::MAX_LENGTH);
            $table->date("due_date")->nullable();
            $table->integer("priority_id")->unsigned()->nullable();
            $table->integer("project_id")->unsigned();
            $table->integer("section_id")->unsigned()->nullable();
            $table->integer("status_id")->unsigned();
            $table->timestamps();
            $table->foreign("priority_id")->references("id")->on("priority");
            $table->foreign("project_id")->references("id")->on("projects");
            $table->foreign("section_id")->references("id")->on("todo_sections");
            $table->foreign("status_id")->references("id")->on("todo_statuses");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('todos');
    }
}
