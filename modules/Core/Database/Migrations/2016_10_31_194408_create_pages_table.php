<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title');
            $table->string('slug');
            $table->longText('content');

            $table->boolean('status')->default(true);

            $table->timestamps();
            $table->softDeletes();
        });

//        Schema::create('page_site', function (Blueprint $table) {
//            $table->integer('site_id')->unsigned()->index();
//            $table->foreign('site_id')->references('id')->on('sites')->onDelete('cascade');
//
//            $table->integer('page_id')->unsigned()->index();
//            $table->foreign('page_id')->references('id')->on('pages')->onDelete('cascade');
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::dropIfExists('page_site');
        Schema::dropIfExists('pages');
    }
}
