<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->string('nick', 256)->nullable();
            $table->string('password', 256)->defualt(255);
            $table->tinyInteger('level')->defualt(0);
            $table->tinyInteger('server')->defualt(0);
            $table->timestamp('lastlogin')->nullable();
            $table->tinyInteger('lastserver')->defualt(0);
            $table->string('lastIP', 17)->nullable();
            $table->timestamp('UnixLastLogin')->nullable();
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
        Schema::dropIfExists('admins');
    }
}
