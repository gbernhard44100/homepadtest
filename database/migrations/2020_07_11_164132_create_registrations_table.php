<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 *  Migration used to create the registration table
 */
class CreateRegistrationsTable extends Migration
{
    /**
     * Run the migrations and create the table in the database with the following columns :
     * - id             : the unique id of the registration
     * - customer_id    : the ID of the customer who has registered for the package
     * - package_id     : the ID of the registered package
     * - registered_at  : date when the package has been registered
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('package_id')->constrained()->onDelete('cascade');
            $table->dateTime('registered_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registrations');
    }
}
