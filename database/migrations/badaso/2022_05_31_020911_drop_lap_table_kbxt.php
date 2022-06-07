<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropLapTableKbxt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        try {

                    Schema::dropIfExists('lap');

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
        Schema::create('lap', function (Blueprint $table) {
            $table->bigInteger('id')->autoIncrement();
			$table->bigInteger('tgl')->index('tgl');
			$table->bigInteger('judul')->index('judul');
			$table->bigInteger('nama')->index('nama');
			$table->bigInteger('instansi')->index('instansi');
			$table->bigInteger('kelas')->index('kelas');
			$table->timestamps();
        });
    }
}
