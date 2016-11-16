<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSuratIzin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suratizin', function (Blueprint $table) {
            $table->increments('id_surat_izin');
            $table->date('tgl_awal');
            $table->date('tgl_akhir');
            $table->string('nama_admin');
            $table->string('id_santri', 10);
            $table->foreign('id_santri')->references('id_santri')->on('santri')->onDelete('cascade')->onUpdate('cascade');
            $table->string('keterangan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('suratizin');
    }
}
