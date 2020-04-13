<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('memo', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode');
            $table->string('auto_kode');
            $table->integer('tiket_id')->unsigned();
            $table->text('pesan');
            $table->integer('to_user_id')->unsigned();
            $table->integer('status')->nullable()->comment('0 : belum di tangani; 1 : Di tangani; 2 : NG;');
            $table->integer('created_by');
            $table->integer('updated_by')->nullable();
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
        Schema::dropIfExists('memo');
    }
}
