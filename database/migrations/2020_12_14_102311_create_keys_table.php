<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keys', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title');
            $table->string('username');
            $table->string('password');
            $table->string('quality')->nullable();
            $table->string('url')->nullable();
            $table->string('notes')->nullable();
            $table->date('expires')->nullable();
            $table->boolean('is_private')->default(false);

            $table->uuid('group_id');
            $table->foreign('group_id')->references('id')->on('groups');

            $table->uuid('category_id');
            $table->foreign('category_id')->references('id')->on('categories');

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
        Schema::dropIfExists('keys');
    }
}
