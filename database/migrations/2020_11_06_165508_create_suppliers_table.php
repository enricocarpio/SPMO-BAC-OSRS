<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();  
            $table->string('document_file')->nullable();
            $table->string('name'); 
            $table->text('address');
            $table->string('owner');
            $table->string('email')->unique();
            $table->string('sales_representative');
            $table->string('contact_number');
            $table->string('bir_tin_number');
            $table->text('categories');
            $table->string('business_type');
            $table->string('status');
            $table->index(['name','owner']);
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
        Schema::dropIfExists('suppliers');
    }
}
