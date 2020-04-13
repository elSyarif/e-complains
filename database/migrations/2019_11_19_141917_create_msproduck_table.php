<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMsproduckTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('msproduck', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tiket_id')->unsigned();
            $table->integer('memo_id')->unsigned();
            $table->string('category', 100);
            $table->string('result')->comment('Jenis Perbaikan Cut/Sew/Ass');
            $table->text('description');
            $table->string('images', 200);
            $table->integer('status')->nullable()->default(0)->comment('0 : belum cek; 1 : Oke Cek PMPA; 2 : NG;'); 
            $table->integer('notif')->nullable()->default(0);
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
        Schema::dropIfExists('msproduck');
    }
}
