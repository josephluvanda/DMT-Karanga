<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Module::generate("Categories", 'categories', 'title', 'fa-th-list', [
            ["title", "Title", "TextField", false, "", 0, 256, true],
            ["description", "Description", "Textarea", false, "", 0, 0, false],
            ["slug", "Slug", "TextField", false, "", 0, 256, true],
            ["added_by", "Added By", "TextField", false, "", 0, 256, false],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('categories')) {
            Schema::drop('categories');
        }
    }
}
