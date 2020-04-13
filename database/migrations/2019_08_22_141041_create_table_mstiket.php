<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMstiket extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mstiket', function (Blueprint $table) {
            $table->increments('id');
            $table->string('category', 100);
            $table->string('kode', 100);
            $table->enum('jenis_complain', ['PRODUCT','PRODUCTION']);
            $table->string('images', 200);
            $table->text('description');
            $table->integer('status')->nullable()->default(0);
            $table->integer('notif')->nullable()->default(0);
            $table->integer('created_by');
            $table->integer('updated_by')->nullable();
            $table->integer('deleted_by')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('mstiket');
    }
}
