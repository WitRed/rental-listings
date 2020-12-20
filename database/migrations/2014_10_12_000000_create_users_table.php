<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->boolean("is_email_visible")->default(false);
            $table->timestamp('email_verified_at')->nullable();
            $table->string("office_phone")->nullable();
            $table->boolean("is_office_phone_visible")->default(false);
            $table->string("gsm_number")->nullable();
            $table->boolean("is_gsm_number_visible")->default(false);
            $table->rememberToken();
            $table->boolean("is_admin")->default(false);
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
