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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_id');
            $table->foreignId('coloring_id');
            $table->string('ordernumber');
            $table->string('fullname');
            $table->string('phone');
            $table->string('service');
            $table->string('coloring');
            $table->string('tanggal_reservasi');
            $table->time('jam_reservasi');
            $table->string('hair_artist');
            $table->string('status_pembayaran');
            // $table->decimal('harga_sementara_service', 15, 2);
            // $table->decimal('harga_sementara_coloring', 15, 2);
            $table->decimal('harga', 15, 2);
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
        Schema::dropIfExists('bookings');
    }
};
