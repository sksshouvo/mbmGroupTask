<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock', function (Blueprint $table) {
            $table->id();
            $table->integer('tr_no')->nullable();
            $table->string('tr_type')->nullable();
            $table->integer('item_id')->nullable();
            $table->integer('supplier_id')->nullable();
            $table->integer('qty')->default(0)->nullable();
            $table->decimal('price', 20,2)->default(0)->nullable();
            $table->enum('status', ['draft', 'approved', 'rejected'])->default('draft')->nullable();
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
        Schema::dropIfExists('stock');
    }
}
