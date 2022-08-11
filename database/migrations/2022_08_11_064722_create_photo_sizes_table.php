<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhotoSizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photo_sizes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('size_id')->unsigned();
            $table->bigInteger('photo_id')->unsigned();
            $table->integer('qte')->unsigned();
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
        Schema::table('photo_sizes', function (Blueprint $table) {
            $table->dropForeign('photo_size_size_id_foreign');
            $table->dropForeign('photo_size_photo_id_foreign');
        });
    }
}
