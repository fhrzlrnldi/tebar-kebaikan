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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->integer('role_id')->default('1'); //  1 == user, 2 == admin
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('google_id')->nullable();
            $table->string('password');
            $table->string('phone')->nullable();
            $table->enum('gender',['laki-laki','perempuan'])->nullable();
            $table->string('path_image')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('job')->nullable();
            $table->text('address')->nullable();
            $table->text('about')->nullable();

            $table->rememberToken();
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
        Schema::dropIfExists('users');

        Schema::table('users', function (Blueprint $table){
            $table->dropColumn('google_id');
            $table->dropColumn('role_id');
        });
    }
};
