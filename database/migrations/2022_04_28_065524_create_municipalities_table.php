<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMunicipalitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('municipalities', function (Blueprint $table) {
            $table->id();
            $table->string('munname');
        });

        DB::table('municipalities')->insert(
            array(
                [
                    'munname' => 'COMPOSTELLA',
                ],
                [
                    'munname' => 'LAAK',
                ],
                [
                    'munname' => 'MABINI',
                ],
                [
                    'munname' => 'MACO',
                ],
                [
                    'munname' => 'MARAGUSAN',
                ],
                [
                    'munname' => 'MAWAB',
                ],
                [
                    'munname' => 'MONKAYO',
                ],
                [
                    'munname' => 'MONTEVISTA',
                ],
                [
                    'munname' => 'NABUNTURAN',
                ],
                [
                    'munname' => 'MONTEVISTA',
                ],
                [
                    'munname' => 'NEW BATAAN',
                ],
                [
                    'munname' => 'PANTUKAN',
                ],
                [
                    'munname' => 'NOT FROM DDO',
                ],
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('municipalities');
    }
}
