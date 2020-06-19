<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuatationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('enquiry_id')->nullable();
            $table->foreignId('truck_type_id')->nullable();
            $table->json('goods_type_id')->nullable();
            $table->foreignId('user_id');
            $table->string('pickup_address')->nullable();
            $table->string('drop_address')->nullable();
            $table->date('shipment_date')->nullable();
            $table->decimal('shipment_weight')->nullable();
            $table->decimal('price')->nullable();
            $table->longText('notes')->nullable();
            $table->boolean('status');
            $table->timestamps();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->foreign('truck_type_id')
                ->references('id')
                ->on('products')
                ->onDelete('cascade');
            $table->foreign('enquiry_id')
                ->references('id')
                ->on('enquiries')
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quotations');
    }
}
