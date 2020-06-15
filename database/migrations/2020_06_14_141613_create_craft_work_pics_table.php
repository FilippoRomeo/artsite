<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCraftWorkPicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('craft_work_pics', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->string('title');
            $table->string('created_by');
            $table->string('description');
            $table->string('location');
            $table->string('manufacturing_period');
            $table->string('manufacturing_type');
            $table->string('manufacturing_date');

            $table->unsignedInteger('added_by');

            $table->string('path');
            $table->double('size', 8, 2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('craft_work_pics');
    }
}
