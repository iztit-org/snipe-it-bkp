<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddMacAddressToAsset extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('assets', function ($table) {
            $table->string('_snipeit_mac_address')->nullable()->default(null);
        });

        Schema::table('models', function ($table) {
            $table->boolean('deprecated_mac_address')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('assets', function ($table) {
            $table->dropColumn('_snipeit_mac_address');
        });

        Schema::table('models', function ($table) {
            $table->dropColumn('deprecated_mac_address');
        });
    }
}
