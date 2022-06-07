<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKelolaakunTableGcyh extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        try {

                    Schema::create('kelolaakun', function (Blueprint $table) {
            $table->bigInteger('id')->unsigned()->autoIncrement();
			$table->integer('hak_akses');
			$table->char('email', 50);
			$table->string('password', 50);
			$table->timestamps();
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
        Schema::dropIfExists('kelolaakun');
    }
}
