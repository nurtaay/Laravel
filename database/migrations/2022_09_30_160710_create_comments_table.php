<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->text('text', 255);
            $table->foreignId('post_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }
    public function down()
    {

        Schema::table('comments', function (Blueprint $table){
            $table->dropForeign('comments_posts_id_foreign');
        });

        Schema::dropIfExists('comments');
    }
};
