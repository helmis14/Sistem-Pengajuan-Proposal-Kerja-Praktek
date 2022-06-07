<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropSudahTableJnrm extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        try {

                    Schema::dropIfExists('sudah');

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
        Schema::create('sudah', function (Blueprint $table) {
            $table->bigInteger('id')->autoIncrement();
			$table->string('Sudah', 100);
			$table->string('Belum', 100);
			$table->timestamps();
        });
    }
}
