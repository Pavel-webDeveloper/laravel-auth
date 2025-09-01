<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateAddSlugInMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // MIGRATION SBAGLIATA
        // Schema::table('movies', function (Blueprint $table) {
        //     $table->string('slug', 130)->unique()->after('titolo');
        // });
        Schema::table('movies', function (Blueprint $table) {
            $table->string('slug', 130)->nullable()->after('titolo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('movies', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
}

// RIMUOVERLA MANUALMENTE NEL DATABASE
// ALTER TABLE movies DROP COLUMN slug;

