<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterXxxTableAuez extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        try {

                    Schema::table('xxx', function (Blueprint $table) {
            $table->bigInteger('limit');
			$table->bigInteger('instansi')->unsigned();
        });

        Schema::table('xxx', function (Blueprint $table) {
            $table->dropForeign(['pengajuanid']);
			$table->foreign('pengajuanid')->references('id')->on('pengajuan')->onDelete('restrict')->onUpdate('no action');
			$table->foreign('instansi')->references('id')->on('pengajuan')->onDelete('restrict')->onUpdate('no action');
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
        Schema::table('xxx', function (Blueprint $table) {
            $table->dropForeign(['pengajuanid']);
			$table->foreign('pengajuanid')->references('id')->on('pengajuan')->onUpdate('no action');
			$table->dropForeign(['instansi']);
        });
        Schema::table('xxx', function (Blueprint $table) {
            $table->dropColumn('limit');
			$table->dropColumn('instansi');
        });


    }
}
