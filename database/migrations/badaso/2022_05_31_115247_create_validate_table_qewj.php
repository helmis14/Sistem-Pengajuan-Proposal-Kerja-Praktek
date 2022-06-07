<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateValidateTableQewj extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        try {

                    Schema::create('validate', function (Blueprint $table) {
            $table->bigInteger('id')->unsigned()->autoIncrement();
			$table->bigInteger('validasiid')->unsigned();
			$table->bigInteger('kelola')->unsigned();
			$table->timestamps();
        });

        Schema::table('validate', function (Blueprint $table) {
            $table->foreign('validasiid')->references('id')->on('validasi')->onDelete('restrict')->onUpdate('no action');
			$table->foreign('kelola')->references('id')->on('kelolarekomendasi')->onDelete('restrict')->onUpdate('no action');
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
        Schema::dropIfExists('validate');
    }
}
