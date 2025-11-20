<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        foreach ($this->add_to_table_list() as $add_table) {
            // if (!Schema::hasColumn($add_table, 'created_by')) {
                DB::statement("ALTER TABLE `{$add_table}` ADD COLUMN `created_by` BIGINT UNSIGNED NULL BEFORE `created_at`");
            // }
        }

        foreach ($this->existing_table_list() as $table) {
            // if (Schema::hasColumn($table, 'user_id')) {
                DB::statement("ALTER TABLE `{$table}` CHANGE `user_id` `created_by` BIGINT UNSIGNED NULL");
            // }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        foreach ($this->add_to_table_list() as $add_table) {
            // if (Schema::hasColumn($add_table, 'created_by')) {
                DB::statement("ALTER TABLE `{$add_table}` DROP COLUMN `created_by`");
            // }
        }

        foreach ($this->existing_table_list() as $table) {
            // if (Schema::hasColumn($table, 'created_by')) {
                DB::statement("ALTER TABLE `{$table}` CHANGE `created_by` `user_id` BIGINT UNSIGNED NULL");
            // }
        }
    }

    public function existing_table_list() {
        return [
            'accessories',
            'accessories_checkout',
            'action_logs',
            'asset_maintenances',
            'assets',
            'categories',
            'components',
            'components_assets',
            'consumables',
            'consumables_users',
            'custom_fields',
            'custom_fieldsets',
            'departments',
            'depreciations',
            'license_seats',
            'licenses',
            'locations',
            'manufacturers',
            'models',
            'settings',
            'status_labels',
            'suppliers',
            'users',
        ];
    }

    public function add_to_table_list() {
        return [
            // 'companies',
            'imports',
            'kits',
            'kits_accessories',
            'kits_consumables',
            'kits_licenses',
            'kits_models',
            'users_groups',
        ];
    }
};
