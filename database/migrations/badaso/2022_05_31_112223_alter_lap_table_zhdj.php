<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterLapTableZhdj extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        try {

                    Schema::table('lap', function (Blueprint $table) {
            $table->dropForeign(['instansi']);
			$table->foreign('instansi')->references('id')->on('kelolarekomendasi')->onDelete('restrict')->onUpdate('no action');
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
        Schema::table('lap', function (Blueprint $table) {
            $table->dropForeign(['instansi']);
			$table->foreign('instansi')->references('id')->on('pengajuan')->onUpdate('no action');
        });

    }
}
