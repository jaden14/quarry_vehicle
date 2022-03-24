<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuarriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quarries', function (Blueprint $table) {
            $table->id();
            $table->string('quarry_type');
            $table->string('control_number');
            $table->string('name');
            $table->string('bus_name');
            $table->string('bus_address');
            $table->string('date_applied');
            $table->string('contact_person');
            $table->string('contact_num');
            $table->string('postal_address');
            $table->string('municipality');
            $table->string('status');
            $table->string('first_notice');
            $table->string('first_notice_date');
            $table->string('second_notice');
            $table->string('second_notice_date');
            $table->string('third_notice');
            $table->string('third_notice_date');
            $table->string('remarks');
            $table->string('date_last_updated');
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
        Schema::dropIfExists('quarries');
    }
}
