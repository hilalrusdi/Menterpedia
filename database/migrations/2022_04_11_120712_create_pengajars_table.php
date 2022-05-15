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
        Schema::create('pengajars', function (Blueprint $table) {
            $table->id();
            $table->string('id_user')->unique();
            $table->string('nama');
            $table->string('tl');
            $table->text('alamat');
            $table->text('domisili');
            $table->text('biodata');
            $table->string('scan_ktp');
            $table->string('scan_ijazah');
            $table->string('transkrip_nilai');
            $table->string('account_status');
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
        Schema::dropIfExists('pengajars');
    }
};
