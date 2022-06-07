<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropSuratbalasanTableVjpt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        try {

                    Schema::dropIfExists('suratbalasan');

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
        Schema::create('suratbalasan', function (Blueprint $table) {
            $table->bigInteger('id')->autoIncrement();
			$table->bigInteger('keloladatamahasiswaid')->index('keloladatamahasiswaid');
			$table->date('tanggal');
			$table->binary('upload');
			$table->timestamps();
        });
    }
}
