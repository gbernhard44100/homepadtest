<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 *  Migration used to create the packages table
 */
class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations and create the table in the database with the following columns :
     * - id     : the unique id of the package
     * - name   : the package name (has to be unique)
     * - limit  : the number of users who can register to the package
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->integer('limit');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('packages');
    }
}
