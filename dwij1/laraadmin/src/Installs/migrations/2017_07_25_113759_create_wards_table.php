<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Module::generate("Wards", 'wards', 'name', 'fa-cube', [
            ["name", "Name", "TextField", false, "", 0, 256, true],
            ["district", "District", "Dropdown", false, "0", 0, 0, true, "@districts"],
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
        if (Schema::hasTable('wards')) {
            Schema::drop('wards');
        }
    }
}
