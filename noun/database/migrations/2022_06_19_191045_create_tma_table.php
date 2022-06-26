<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
class CreateTmaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tmas', function (Blueprint $table) {
            $table->id();
            $table->longText('question');
            $table->text('answer');
            $table->string('course');
            $table->timestamps();
        });

        DB::statement('ALTER TABLE tmas ADD FULLTEXT search(question, answer)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tmas');
    }
}
