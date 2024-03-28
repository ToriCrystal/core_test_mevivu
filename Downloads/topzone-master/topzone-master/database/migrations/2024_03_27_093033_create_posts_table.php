<?php

use App\Enums\DefaultStatus;
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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('feature_image')->nullable();
            $table->tinyInteger('status')->default(DefaultStatus::Draft->value);
            $table->text('excerpt')->nullable();
            $table->longText('content')->nullable();
            $table->dateTime('posted_at');
            $table->timestamps();
        });
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->integer('_lft');
            $table->integer('_rgt');
            $table->string('name');
            $table->string('slug')->unique();
            $table->integer('position')->default(0);
            $table->tinyInteger('status')->default(DefaultStatus::Draft->value);
            $table->foreignId('parent_id')->nullable();
            $table->timestamps();
            $table->foreign('parent_id')->references('id')->on('categories')->onDelete('SET NULL');
        });

        Schema::create('post_categories', function (Blueprint $table) {
            $table->foreignId('post_id');
            $table->foreignId('category_id');
            $table->primary(['post_id', 'category_id']);
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
