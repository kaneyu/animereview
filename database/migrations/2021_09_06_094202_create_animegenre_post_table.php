<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimegenrePostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animegenre_post', function (Blueprint $table) {
            $table->unsignedInteger('animegenre_id');
            $table->unsignedInteger('post_id');
            //$table->primary(['animegenre_id','post_id']);
            $table->timestamps();
            
            $table->foreign('animegenre_id')->references('id')->on('animegenres')->onDelete('cascade');
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('animegenre_post');
    }
}
