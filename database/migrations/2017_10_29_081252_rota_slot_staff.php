<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RotaSlotStaff extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rota_slot_staff', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rotaid');
            $table->tinyInteger('daynumber');
            $table->integer('staffid');
            $table->string('slottype', 20);
            $table->time('starttime');
            $table->time('endtime');
            $table->float('workhours', 4, 2);
            $table->integer('premiumminutes');
            $table->integer('roletypeid');
            $table->integer('freeminutes');
            $table->integer('seniorcashierminutes');
            $table->string('splitshifttimes');

            $table->index(['rotaid', 'staffid']);
            $table->index('daynumber');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rota_slot_staff');        
    }
}
