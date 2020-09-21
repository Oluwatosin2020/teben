<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToPayReceiptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pay_receipts', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->index()->nullable()->change();
            $table->unsignedBigInteger('school_account_id')->nullable()->after('user_id');
            $table->string('reference',30)->unique()->after('type');
            $table->text('comment')->nullable()->after('reference');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pay_receipts', function (Blueprint $table) {
            //
        });
    }
}
