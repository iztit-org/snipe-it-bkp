<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class MigrateMacAddress extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Create the custom fieldset and field as before
        // $f2 = new \App\Models\CustomFieldset(['name' => 'Asset with MAC Address']);
        // $f2->timestamps = false; // when originally created it had no timestamps
        // if (! $f2->save()) {
        //     throw new Exception("couldn't save customfieldset");
        // }

        // $macid = DB::table('custom_fields')->insertGetId([
        //     'name'   => 'MAC Address',
        //     'format' => \App\Models\CustomField::PREDEFINED_FORMATS['MAC'],
        //     'element'=> 'text',
        // ]);

        // if (! $macid) {
        //     throw new Exception("Can't save MAC Custom field: $macid");
        // }

        // $f2->fields()->attach($macid, ['required' => false, 'order' => 1]);
        // \App\Models\AssetModel::where(['show_mac_address' => true])->update(['fieldset_id' => $f2->id]);

        // === IMPORTANT: use raw ALTER TABLE to avoid Doctrine / information_schema introspection ===
        // Adjust the column types below if your DB uses different definitions.

        // Rename assets.mac_address -> _snipeit_mac_address
        // (assumes original mac_address is VARCHAR(255) NULL)
        // if (Schema::hasColumn('assets', 'mac_address')) {
        //     DB::statement("ALTER TABLE `assets` CHANGE `mac_address` `_snipeit_mac_address` VARCHAR(255) NULL");
        // }

        // Rename models.show_mac_address -> deprecated_mac_address
        // (assumes original show_mac_address is TINYINT(1) NOT NULL DEFAULT 0)
        // if (Schema::hasColumn('models', 'show_mac_address')) {
        //     DB::statement("ALTER TABLE `models` CHANGE `show_mac_address` `deprecated_mac_address` TINYINT(1) NOT NULL DEFAULT 0");
        // }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // $f = \App\Models\CustomFieldset::where(['name' => 'Asset with MAC Address'])->first();

        // if ($f) {
        //     // detach/delete pivot entries first if necessary
        //     $f->fields()->delete();
        //     $f->delete();
        // }

        // Rename models.deprecated_mac_address -> show_mac_address (restore)
        // if (Schema::hasColumn('models', 'deprecated_mac_address')) {
        //     DB::statement("ALTER TABLE `models` CHANGE `deprecated_mac_address` `show_mac_address` TINYINT(1) NOT NULL DEFAULT 0");
        // }

        // Rename assets._snipeit_mac_address -> mac_address (restore)
        // if (Schema::hasColumn('assets', '_snipeit_mac_address')) {
        //     DB::statement("ALTER TABLE `assets` CHANGE `_snipeit_mac_address` `mac_address` VARCHAR(255) NULL");
        // }
    }
}