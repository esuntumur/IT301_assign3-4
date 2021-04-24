<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // хүснэгтээ энд үүсгэнэ
    public function up()
    {
        Schema::create('account', function (Blueprint $table) {
            $table->id();
            $table->integer('account_number');
            $table->string('account_name');
            $table->integer('account_balance');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    // хүснэгтээ устгана.
    public function down()
    {
        Schema::dropIfExists('account');
    }
}