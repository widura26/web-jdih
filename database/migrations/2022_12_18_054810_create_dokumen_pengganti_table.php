<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokumen_pengganti', function (Blueprint $table) {
            $table->bigInteger('id_dok_diganti');
            $table->bigInteger('id_dok_pengganti');
            $table->char('kode_pergantian', 1)->nullable();
            $table->unique(['id_dok_diganti', 'id_dok_pengganti']);
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
        Schema::dropIfExists('dokumen_penggantits');
    }
};
