<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLapTableZief extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        try {

                    Schema::create('lap', function (Blueprint $table) {
            $table->bigInteger('id')->unsigned()->autoIncrement();
			$table->bigInteger('tgl')->unsigned();
			$table->bigInteger('nama')->unsigned();
			$table->bigInteger('instansi')->unsigned();
			$table->bigInteger('kelas')->unsigned();
			$table->bigInteger('judul')->unsigned();
			$table->timestamps();
        });

        Schema::table('lap', function (Blueprint $table) {
            $table->foreign('tgl')->references('id')->on('pengajuan')->onDelete('restrict')->onUpdate('no action');
			$table->foreign('nama')->references('id')->on('pengajuan')->onDelete('restrict')->onUpdate('no action');
			$table->foreign('instansi')->references('id')->on('pengajuan')->onDelete('restrict')->onUpdate('no action');
			$table->foreign('kelas')->references('id')->on('pengajuan')->onDelete('restrict')->onUpdate('no action');
			$table->foreign('judul')->references('id')->on('kelolarekomendasi')->onDelete('restrict')->onUpdate('no action');
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
        Schema::dropIfExists('lap');
    }
}
