<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGalerisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galeri', function (Blueprint $table) {
            $table->increments('id');
            $table->string('judul')->nullable();
            $table->string('judul_slug')->nullable();
            $table->string('deskripsi')->nullable();
            $table->integer('flag')->nullable()->default(0);
            $table->string('tag')->nullable();
            $table->string('gambar')->nullable();
            $table->string('views')->nullable();
            $table->integer('author_id')->nullable()->default(0);
            $table->string('kategori')->nullable();
            $table->timestamps();
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
        Schema::dropIfExists('galeri');
    }
}
