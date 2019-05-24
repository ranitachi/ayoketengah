<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('judul')->nullable();
            $table->string('deskripsi')->nullable();
            $table->integer('flag')->nullable()->default(0);
            $table->string('tag')->nullable();
            $table->string('video')->nullable();
            $table->string('views')->nullable();
            $table->integer('author_id')->nullable()->default(0);
            $table->string('kategori')->nullable();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('video');
    }
}
