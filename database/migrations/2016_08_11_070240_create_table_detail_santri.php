<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDetailSantri extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_santri', function (Blueprint $detail_santri) {
            $detail_santri->increments('id_detail_santri');         
            $detail_santri->string('no_telpon', 15)->nullable();            
            $detail_santri->enum('golongan_darah', ['A', 'B', 'AB', 'O'])->nullable();
            $detail_santri->enum('jenjang_pendidikan', ['SD', 'SMP', 'SMA', 'Universitas', 'Lainnya']);
            $detail_santri->string('nama_tempat_pendidikan', 50)->nullable();
            $detail_santri->string('penyakit')->nullable();
            $detail_santri->string('foto')->nullable();
            $detail_santri->string('id_santri', 10);
            $detail_santri->foreign('id_santri')->references('id_santri')->on('santri')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
