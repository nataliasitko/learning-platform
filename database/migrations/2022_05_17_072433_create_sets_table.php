<?php

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
        if(!Schema::hasTable('sets')){
            Schema::create('sets', function (Blueprint $table) {
                $table->id()->unique();
                $table->string('name')->unique();
                $table->text('description')->nullable();
                $table->timestamps();
                $table->foreignId('user_id')->constrained();
                $table->engine = 'InnoDB';
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sets');
    }
};
