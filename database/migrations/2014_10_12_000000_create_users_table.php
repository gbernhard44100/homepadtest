<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 *  Migration used to create the users table
 */
class CreateUsersTable extends Migration
{
    /**
     * Run the migrations and create the users table in the database with the following columns :
     * - id                 : the unique id of the user
     * - name               : the name entered by the user
     * - email              : the email entered by the user (has to be unique)
     * - email_verified_at  : date when the email has been verified (will not be used right now but we still set it in case )
     * - password           : the encrypted user password
     * - remember_token     : the token which the user will keep to stay connected
     * - created_at         : when this record has been created
     * - updated_at         : when this record has been updated
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
