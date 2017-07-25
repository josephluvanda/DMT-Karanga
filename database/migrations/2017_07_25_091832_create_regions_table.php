<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Module::generate("Regions", 'regions', 'name', 'fa-cube', [
            ["name", "Name", "TextField", false, "", 0, 256, true],
            ["position", "Position", "TextField", true, "", 0, 20, false],
            ["description", "Description", "Textarea", false, "", 0, 0, true],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('registrations')) {
            Schema::drop('registrations');
        }
    }
}
