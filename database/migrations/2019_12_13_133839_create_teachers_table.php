<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->index();

            $table->string('workplace');
            $table->string('workaddress');
            $table->string('emp_phone');
            $table->string('workposition');

            $table->string('qualification');
            $table->string('yrs_experience');
            $table->string('specialty');
            $table->string('language');

            $table->integer('jobs')->default(0);
            $table->integer('rating')->default(0);
            $table->integer('report')->default(0);
            $table->integer('status')->default(0);

            $table->string('n_o_k');
            $table->string('relationship');
            $table->string('phone_n_o_k');
            $table->string('major');
            $table->string('sub1')->nullable();
            $table->string('sub2')->nullable();
            
            $table->string('comment')->nullable();
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('teachers');
    }
}
