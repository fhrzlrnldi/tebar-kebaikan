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
        Schema::create('galang_danas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('kategori_id');
            $table->string('judul');
            $table->string('slug')->unique();
            $table->string('short_description');
            $table->longText('body');
            $table->integer('view_count')->default(0);
            $table->enum('status',['publish','pending','archived'])->default('pending');
            $table->integer('nominal')->default(0);;
            $table->integer('goal');
            $table->dateTime('end_date');
            $table->text('note')->nullable();
            $table->string('penerima');
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
        Schema::dropIfExists('galang_danas');
        
    }
};
