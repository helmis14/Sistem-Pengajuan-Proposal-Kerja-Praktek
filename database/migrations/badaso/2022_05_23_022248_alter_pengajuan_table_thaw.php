<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterPengajuanTableThaw extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        try {

                    Schema::table('pengajuan', function (Blueprint $table) {
            $table->dropForeign(['rekomendasiid']);
			$table->foreign('rekomendasiid')->references('id')->on('rekomendasi')->onDelete('restrict')->onUpdate('no action');
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
        Schema::table('pengajuan', function (Blueprint $table) {
            $table->dropForeign(['rekomendasiid']);
			$table->foreign('rekomendasiid')->references('id')->on('rekomendasi')->onUpdate('no action');
        });

    }
}
