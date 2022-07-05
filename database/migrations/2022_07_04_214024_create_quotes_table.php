<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('quotes', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->default('0');
            $table->string('author');
            $table->string('body');
            $table->timestamps();
        });

        DB::table('quotes')->insert([
            'author' => 'Nikola Tesla',
            'body' => "I don't care that they stole my idea . . I care that they don't have any of their own",
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quotes');
    }
};
