<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTodoSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('todo_sections', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name", 256);
            $table->integer("project_id")->unsigned();
            $table->timestamps();
            $table->foreign("project_id")->references("id")->on("projects");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('todo_sections');
    }
}
