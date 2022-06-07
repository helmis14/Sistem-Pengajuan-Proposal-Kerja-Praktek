<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterKeloladatamahasiswaTableGlif extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        try {

                    Schema::table('keloladatamahasiswa', function (Blueprint $table) {
            $table->bigInteger('npm')->charset('')->collation('')->change();
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
        Schema::table('keloladatamahasiswa', function (Blueprint $table) {
            $table->bigInteger('npm')->charset('')->collation('')->change();
        });
    }
}
