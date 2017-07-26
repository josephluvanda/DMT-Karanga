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
            ["category", "Category", "Dropdown", false, "1", 0, 0, true, "@categories"],
            ["document", "Document File", "File", false, "", 0, 250, true],
            ["description", "Description", "Textarea", false, "", 0, 0, true],
            ["tags", "Tags", "Taginput", false, [], 0, 0, false],
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
