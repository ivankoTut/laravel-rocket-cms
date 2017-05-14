<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Kalnoy\Nestedset\NestedSet;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_pages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();

            $table->index('id','id');
        });


        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('slug');

            $table->integer('type_page_id')->unsigned();
            $table->foreign('type_page_id')
                ->references('id')
                ->on('type_pages')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->integer('order')->default(0);
            $table->text('text')->nullable();
            $table->timestamps();

            $table->index('id','id');
            $table->index('type_page_id','type_page_id');

            NestedSet::columns($table);
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages');
        Schema::dropIfExists('type_pages');
    }
}
