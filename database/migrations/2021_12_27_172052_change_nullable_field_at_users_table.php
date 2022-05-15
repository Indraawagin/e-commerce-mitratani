<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeNullableFieldAtUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->longText('addresss')->nullable()->change();
            $table->integer('provinces_id')->nullable()->change();
            $table->integer('districts_id')->nullable()->change();
            $table->integer('regencies_id')->nullable()->change();
            $table->integer('zip_code')->nullable()->nullable()->change();
            $table->string('country')->nullable()->change();
            $table->string('phone_number')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->longText('addresss')->nullable(false)->change();
            $table->integer('provinces_id')->nullable(false)->change();
            $table->integer('districts_id')->nullable(false)->change();
            $table->integer('regencies_id')->nullable(false)->change();
            $table->integer('zip_code')->nullable(false)->nullable(false)->change();
            $table->string('country')->nullable(false)->change();
            $table->string('phone_number')->nullable(false)->change();
        });
    }
}
