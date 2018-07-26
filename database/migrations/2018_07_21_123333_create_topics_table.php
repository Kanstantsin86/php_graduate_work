<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topics', function (Blueprint $table) {
            $table->increments('id');
            $table->string('topic', 80);
            $table->integer('user_id')->unsigned();
            $table->timestamps();

            /*$table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('topics');
        /*Schema::dropIfExists('topics', function (Blueprint $table) {
            $table->dropForeign('topics_user_id_foreign');
        });*/
    }
}
