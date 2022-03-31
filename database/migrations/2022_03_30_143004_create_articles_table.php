<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{

    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('platform');
            $table->string('platform_id');
            $table->string('cover_image');
            $table->string('title');
            $table->integer('reactions');
            $table->integer('comments');
            $table->integer('reading_time_minutes');
            $table->boolean('is_english');
            $table->timestamp('published_at');
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
        Schema::dropIfExists('articles');
    }
}
