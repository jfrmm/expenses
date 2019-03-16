<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDebtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('debts', function (Blueprint $table) {
            $table->unsignedInteger('movement_id');
            $table->unsignedInteger('debt_type_id')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('movement_id')->references('id')->on('movements')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('debt_type_id')->references('id')->on('debt_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('debts');
    }
}
