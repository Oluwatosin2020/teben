<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('username',20)->unique();
            $table->string('email',100)->unique()->nullable();
            $table->string('uuid',100)->unique();
            $table->string('avatar')->nullable();
            $table->string('phone')->nullable();
            $table->string('gender')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('town')->nullable();
            $table->string('lga')->nullable();
            $table->string('state')->nullable();
            $table->string('address')->nullable();
            $table->string('country')->nullable();
            $table->string('role');
            $table->integer('wallet')->default(0);
            $table->integer('status')->default(1);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
