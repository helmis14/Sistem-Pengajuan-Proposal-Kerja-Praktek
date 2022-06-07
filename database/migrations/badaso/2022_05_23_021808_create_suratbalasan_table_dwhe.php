<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuratbalasanTableDwhe extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        try {

                    Schema::create('suratbalasan', function (Blueprint $table) {
            $table->bigInteger('id')->unsigned()->autoIncrement();
			$table->date('tanggal');
			$table->binary('upload');
			$table->bigInteger('keloladatamahasiswaid')->unsigned();
			$table->timestamps();
        });

        Schema::table('suratbalasan', function (Blueprint $table) {
            $table->foreign('keloladatamahasiswaid')->references('id')->on('keloladatamahasiswa')->onDelete('restrict')->onUpdate('no action');
        });

        } catch (PDOException $ex) {
            $this->down();
            throw $ex;
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('suratbalasan');
    }
}
