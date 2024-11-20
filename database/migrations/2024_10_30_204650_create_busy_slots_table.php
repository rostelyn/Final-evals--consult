<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusySlotsTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('busy_slots')) {
            Schema::create('busy_slots', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('user_id');
                $table->string('title');
                $table->text('description')->nullable();
                $table->date('date');
                $table->json('busy_times');
                $table->timestamps();
            });
        }
    }
    
    
    public function down()
    {
        Schema::dropIfExists('busy_slots');
    }
}



