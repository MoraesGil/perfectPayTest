<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id');
            $table->integer('costumer_id');
            $table->tinyInteger('status')
                ->default(0)
                ->comment('0 - salled , 1 - cancelled, 2 - refund');

                $table->decimal('price');
            $table->integer('amount');
            $table->decimal('discount')->nullable();
            $table->date('date')->useCurrent();
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products')->onDelete('no action')->onUpdate('no action');
            $table->foreign('costumer_id')->references('id')->on('costumers')->onDelete('no action')->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sales', function (Blueprint $table) {
            $table->dropForeign(['product_id']);
            $table->dropForeign(['costumer_id']);
        });

        Schema::drop('sales');
    }
}
