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
        Schema::create('donasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('galang_dana_id');
            $table->foreignId('user_id');
            $table->string('order_number');
            $table->string('no_va')->nullable();
            $table->string('jenis_pembayaran')->nullable();
            // 0 false 1 true
            $table->boolean('anonim')->default(false);
            $table->integer('nominal');
            $table->text('dukungan')->nullable();
            $table->enum('status',['confirmed','not confirmed','expired']);
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
        Schema::dropIfExists('donasis');
    }
};
