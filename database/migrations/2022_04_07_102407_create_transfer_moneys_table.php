<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransferMoneysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transfer_moneys', function (Blueprint $table) {
            $table->string('id', 255)->primary();
            $table->string('sender_id',255);
            $table->string('receiver_id',255);
            $table->decimal('transfer_amount', $precision = 13, $scale = 2);
            $table->decimal('sender_before_transfer_amount', $precision = 13, $scale = 2);
            $table->decimal('sender_after_transfer_amount', $precision = 13, $scale = 2);
            $table->decimal('receiver_before_transfer_amount', $precision = 13, $scale = 2);
            $table->decimal('receiver_after_transfer_amount', $precision = 13, $scale = 2);
            $table->foreign('sender_id')->references('id')->on('customers');
            $table->foreign('receiver_id')->references('id')->on('customers');
            $table->timestamp('transfer_date')->nullable();
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
        Schema::dropIfExists('transfer_moneys');
    }
}
