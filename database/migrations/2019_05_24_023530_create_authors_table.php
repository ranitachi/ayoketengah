<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('author', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama')->nullable();
            $table->string('singkatan')->nullable();
            $table->string('foto')->nullable();
            $table->string('email')->nullable();
            $table->text('alamat')->nullable();
            $table->string('telp')->nullable();
            $table->string('sosmed')->nullable();
            $table->string('biografi')->nullable();
            $table->string('website')->nullable();
            $table->integer('flag')->nullable()->default(0);
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
        Schema::dropIfExists('author');
    }
}
