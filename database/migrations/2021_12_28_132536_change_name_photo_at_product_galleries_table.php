<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeNamePhotoAtProductGalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_galleries', function (Blueprint $table) {
            $table->renameColumn('photo', 'photos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_galleries', function (Blueprint $table) {
            $table->renameColumn('photos', 'photo');
        });
    }
}
