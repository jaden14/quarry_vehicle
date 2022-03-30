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
            $table->string('contact_person')->nullable();
            $table->string('contact_num')->nullable();
            $table->string('postal_address')->nullable();
            $table->string('municipality')->nullable();
            $table->string('status')->nullable();
            $table->string('first_notice')->nullable();
            $table->string('first_notice_date')->nullable();
            $table->string('second_notice')->nullable();
            $table->string('second_notice_date')->nullable();
            $table->string('third_notice')->nullable();
            $table->string('third_notice_date')->nullable();
            $table->string('remarks')->nullable();
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
