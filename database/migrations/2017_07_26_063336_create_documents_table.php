<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Module::generate("Documents", 'documents', 'title', 'fa-file', [
            ["title", "Title", "TextField", false, "", 5, 250, true],
            ["category_id", "Category", "Dropdown", false, "1", 0, 0, true, "@categories"],
            ["description", "Description", "Textarea", false, "", 0, 0, true],
            ["tags", "Tags", "Taginput", false, [], 0, 0, false],
            ["path", "Path", "String", false, "", 0, 250, false],
            ["public", "Is Public", "Checkbox", false, "0", 0, 0, false],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('documents')) {
            Schema::drop('documents');
        }
    }
}
