<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterRevTableUfdo extends Migration
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
            $table->bigInteger('revisi')->charset('')->collation('')->change();
			$table->bigInteger('revisi')->unsigned()->charset('')->collation('')->change();
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
            $table->json('revisi')->charset('')->collation('')->change();
			$table->json('revisi')->unsigned(false)->charset('')->collation('')->change();
        });
    }
}
