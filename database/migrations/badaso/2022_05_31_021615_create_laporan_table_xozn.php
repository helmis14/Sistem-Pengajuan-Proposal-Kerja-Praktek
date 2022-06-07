<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLaporanTableXozn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        try {

                    Schema::create('laporan', function (Blueprint $table) {
            $table->bigInteger('id')->unsigned()->autoIncrement();
			$table->bigInteger('nama')->unsigned();
			$table->bigInteger('judul')->unsigned();
			$table->bigInteger('revisi')->unsigned();
			$table->timestamps();
        });

        Schema::table('laporan', function (Blueprint $table) {
            $table->foreign('nama')->references('id')->on('pengajuan')->onDelete('restrict')->onUpdate('no action');
			$table->foreign('judul')->references('id')->on('kelolarekomendasi')->onDelete('restrict')->onUpdate('no action');
			$table->foreign('revisi')->references('id')->on('rev')->onDelete('restrict')->onUpdate('no action');
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
        Schema::dropIfExists('laporan');
    }
}
