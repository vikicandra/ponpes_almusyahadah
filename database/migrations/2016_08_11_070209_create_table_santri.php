<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSantri extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('santri', function (Blueprint $santri) {
            $santri->string('id_santri', 10);
            $santri->primary('id_santri');
            $santri->string('nama', 80);
            $santri->string('tempat_lahir', 50);
            $santri->date('tgl_lahir');
            $santri->string('alamat');
            $santri->enum('jenis_kelamin', ['L', 'P']);
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
