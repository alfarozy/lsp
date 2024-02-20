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
        Schema::create('asesmens', function (Blueprint $table) {
            $table->id();
            $table->foreignId("jadwal_id");
            $table->foreignId("asesor_id");
            $table->foreignId("siswa_id");
            $table->enum("status", ["Kompeten", "Tidak Kompeten"]);
            $table->text('description')->nullable();
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
        Schema::dropIfExists('asesmens');
    }
};
