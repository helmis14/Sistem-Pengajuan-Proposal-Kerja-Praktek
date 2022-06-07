<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterRevTableVjtc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        try {

                    Schema::table('rev', function (Blueprint $table) {
            $table->dropForeign(['pengajuanid']);
			$table->dropForeign(['namapengaju']);
        });

        Schema::table('rev', function (Blueprint $table) {
            $table->dropColumn('pengajuanid');
			$table->dropColumn('namapengaju');
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

        Schema::table('rev', function (Blueprint $table) {
            $table->bigInteger('pengajuanid')->unsigned();
			$table->bigInteger('namapengaju')->unsigned();
        });

        Schema::table('rev', function (Blueprint $table) {
            $table->foreign('pengajuanid')->references('id')->on('pengajuan')->onUpdate('no action');
			$table->foreign('namapengaju')->references('id')->on('pengajuan')->onUpdate('no action');
        });


    }
}
