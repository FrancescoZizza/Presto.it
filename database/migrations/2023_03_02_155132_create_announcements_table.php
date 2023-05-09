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
        Schema::create('announcements', function (Blueprint $table) {   
             //Decimal è un tipo di dato che rappresenta numeri decimali in  modo esatto. Ciò significa che non viene mai arrotondato o approssimato.
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->decimal('price', 8, 2);                                                                 
            $table->string('position');
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('announcements');
    }
};
