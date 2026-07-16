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
    Schema::create('services', function (Blueprint $table) {
        $table->id();

        $table->foreignId('pelanggan_id')->constrained('pelanggans');
        $table->foreignId('teknisi_id')->constrained('teknisis');

        $table->string('merk_hp');
        $table->string('tipe_hp');
        $table->string('imei')->unique();
        $table->text('kerusakan');

        $table->date('tanggal_masuk');
        $table->date('estimasi_selesai');

        $table->enum('status', [
            'Menunggu',
            'Diproses',
            'Selesai',
            'Diambil'
        ]);

        $table->decimal('biaya',10,2);

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
        Schema::dropIfExists('services');
    }
};
