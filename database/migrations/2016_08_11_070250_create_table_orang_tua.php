<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableOrangTua extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orang_tua', function (Blueprint $orang_tua) {
            $orang_tua->increments('id_orang_tua');
            $orang_tua->string('nama_ayah', 80);
            $orang_tua->string('no_ktp_ayah', 20);
            $orang_tua->enum('pendidikan_ayah', ['SD', 'SMP', 'SMA', 'S1', 'S2', 'S3', 'Lainnya']);
            $orang_tua->string('pekerjaan_ayah');

            $orang_tua->string('nama_ibu', 80);
            $orang_tua->string('no_ktp_ibu', 20);
            $orang_tua->enum('pendidikan_ibu', ['SD', 'SMP', 'SMA', 'S1', 'S2', 'S3', 'Lainnya']);
            $orang_tua->string('pekerjaan_ibu');

            $orang_tua->integer('penghasilan_ortu');
            $orang_tua->string('alamat_ortu', 50);

            $orang_tua->string('id_santri', 10);
            $orang_tua->foreign('id_santri')->references('id_santri')->on('santri')->onDelete('cascade')->onUpdate('cascade');
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
