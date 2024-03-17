<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStandarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('standars', function (Blueprint $table) {
            $table->id();
            $table->text('jenis');
            $table->text('persyartan');
            $table->text('biaya');
            $table->text('waktu');
            $table->text('alur');
            $table->text('telepon');
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
        Schema::dropIfExists('standars');
    }
}
