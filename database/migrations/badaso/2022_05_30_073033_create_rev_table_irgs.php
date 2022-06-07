<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRevTableIrgs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        try {

                    Schema::create('rev', function (Blueprint $table) {
            $table->bigInteger('id')->unsigned()->autoIncrement();
			$table->bigInteger('pengajuanid')->unsigned();
			$table->bigInteger('namapengaju')->unsigned();
			$table->boolean('revisi');
			$table->timestamps();
        });

        Schema::table('rev', function (Blueprint $table) {
            $table->foreign('pengajuanid')->references('id')->on('pengajuan')->onDelete('restrict')->onUpdate('no action');
			$table->foreign('namapengaju')->references('id')->on('pengajuan')->onDelete('restrict')->onUpdate('no action');
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
        Schema::dropIfExists('rev');
    }
}
