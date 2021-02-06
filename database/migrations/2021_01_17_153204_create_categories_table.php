<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id()-> autoIncrement();
            $table->integer(column: 'parent_id')->default(0);
            $table->string(column: 'title', length: 150 );
            $table->integer(column: 'keywords')->nullable();
            $table->integer(column: 'description')->nullable();
            $table->string(column: 'image', length: 100)->nullable();
            $table->string(column: 'status', length: 5)->nullable()->default('False');

            $table->timestamps();// creat at update_at otomatik olusuyor burada

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
