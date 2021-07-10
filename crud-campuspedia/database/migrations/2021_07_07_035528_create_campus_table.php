<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campus', function (Blueprint $table) {
            $table->integer('kodeuniv',11);
            $table->string('logo',100);
            $table->string('nama',100);
            $table->string('tahun',11);
            $table->string('akreditasi',10);
            $table->string('status',50);
            $table->string('alamat',150);
            $table->string('peringkat_lokal',100);
            $table->string('contact',20);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('campus');
    }
}
