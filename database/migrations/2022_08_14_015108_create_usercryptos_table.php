<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsercryptosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usercryptos', function (Blueprint $table) {
           $table->id();
           $table->string('email')->unique();
           $table->double('btc', 15, 10)->nullable()->default(0);
           $table->double('eth', 15, 10)->nullable()->default(0);
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
        Schema::dropIfExists('usercryptos');
    }
}
