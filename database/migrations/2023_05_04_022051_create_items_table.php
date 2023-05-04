<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('vendor_id');
            $table->string('code');
            $table->string('name');
            $table->integer('qty')->default(0);
            $table->string('unit');
            $table->string('price')->default(0);
            $table->bigInteger('total');
            $table->string('ppn');
            $table->integer('discount')->default(0);
            $table->text('description')->nullable();
            $table->integer('created_by')->default(0);
            $table->integer('no_do');
            $table->timestamp('entry_date')->nullable();
            $table->timestamp('do_date')->nullable();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
