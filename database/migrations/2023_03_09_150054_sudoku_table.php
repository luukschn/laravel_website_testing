<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SudokuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sudoku', function (Blueprint $table) {
            $table->unsignedBigInteger('userId')->nullable();

            $table->foreign('userId')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');

            $table->integer('sudoku_elo')->default(1000);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sudoku');
    }
}
