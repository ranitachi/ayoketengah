<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePublikasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publikasi', function (Blueprint $table) {
            $table->increments('id');
            $table->string('judul')->nullable();
            $table->integer('kategori_id')->nullable()->default(0);
            $table->integer('flag')->nullable()->default(0);
            $table->integer('views')->nullable()->default(0);
            $table->string('tag')->nullable();
            $table->string('deskripsi')->nullable();
            $table->string('cover')->nullable();
            $table->integer('author_id')->nullable()->default(0);
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
        Schema::dropIfExists('publikasi');
    }
}
