<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArchivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('archives', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('type')->nullable();
            $table->string('model_id')->nullable();
            $table->string('model_name')->nullable();
            $table->string('date')->nullable();
            $table->string('title')->nullable();
            $table->string('serisal')->nullable();
            $table->string('fileIDS')->nullable();
            $table->integer('type_id')->unsigned()->nullable();
            $table->foreign('type_id')->references('id')->on('archive_types')->onDelete('cascade');
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
        Schema::dropIfExists('archives');
    }
}
