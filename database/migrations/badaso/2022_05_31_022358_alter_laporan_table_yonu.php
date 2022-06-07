<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterLaporanTableYonu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        try {

                    Schema::table('laporan', function (Blueprint $table) {
            $table->dropForeign(['revisi']);
			$table->foreign('revisi')->references('id')->on('decision')->onDelete('restrict')->onUpdate('no action');
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
        Schema::table('laporan', function (Blueprint $table) {
            $table->dropForeign(['revisi']);
			$table->foreign('revisi')->references('id')->on('rev')->onUpdate('no action');
        });

    }
}
