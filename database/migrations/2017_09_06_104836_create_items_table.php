<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('user_id');
            $table->text('thumbnail_path');
            $table->text('image_path');
            $table->text('description');
            $table->decimal('amount', 10, 2);
            $table->string('unit');
            $table->datetime('sold_at')->nullable();
            $table->timestamps();

            $table->foreign('user_id')
              ->references('id')->on('users')
              ->onDelete('cascade')
              ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
