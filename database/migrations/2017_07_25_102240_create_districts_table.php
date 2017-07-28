<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDistrictsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Module::generate("Districts", 'districts', 'name', 'fa-cube', [
            ["name", "Name", "TextField", false, "", 0, 256, true],
            ["region", "Region", "Dropdown", false, "0", 0, 0, true, "@regions"],
            ["description", "Description", "Textarea", false, "", 0, 0, false],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('districts')) {
            Schema::disableForeignKeyConstraints();
            Schema::drop('districts');
            Schema::disableForeignKeyConstraints();
        }
    }
}
