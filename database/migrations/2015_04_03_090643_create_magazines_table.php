<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMagazinesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('magazines', function(Blueprint $table) {
                    $table->increments('id');
                    $table->string('name');
                    $table->text('description');
                    $table->integer('category_id');
                    $table->tinyInteger('is_active');
                    $table->timestamps();
                });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        //
    }

}
