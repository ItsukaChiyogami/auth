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
        Schema::create('c_d_s', function (Blueprint $table) {
            $table->id();
            $table->string('Judul_CD');
            $table->string('Genre');
            $table->string('Tahun_Terbit');
            $table->string('updated_at');
            $table->string(column: 'created_at');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('c_d_s');
    }
};
