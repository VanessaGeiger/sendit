<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserToFileentry extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('fileentries', function($table) {
            $table->integer('user_id')->unsigned();
            $table->integer('size');
            $table->integer('downloads');
            $table->string('hash');
            $table->date('expiration');
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
            $table->string('recipient');
            $table->string('subject');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fileentries');

    }
}
