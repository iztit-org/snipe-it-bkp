<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddSlackToSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->string('webhook_endpoint')->nullable()->default(null);
            $table->string('webhook_channel')->nullable()->default(null);
            $table->string('webhook_botname')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('settings', function (Blueprint $table) {
            //
            $table->dropColumn('webhook_endpoint');
            $table->dropColumn('webhook_channel');
            $table->dropColumn('webhook_botname');
        });
    }
}
