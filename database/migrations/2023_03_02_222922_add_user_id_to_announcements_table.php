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
        // viene definita una chiave esterna (foreign key) sulla colonna user_id che fa riferimento alla colonna id della tabella users. Questo significa che ogni valore nella colonna user_id deve esistere nella tabella users. Se un utente viene eliminato dalla tabella users, tutte le righe corrispondenti nella tabella announcements vengono eliminate automaticamente (onDelete('cascade')).
        Schema::table('announcements', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('announcements', function (Blueprint $table) {
            // Questa migrazione rimuove la chiave esterna (foreign key) sulla colonna user_id della tabella announcements usando il metodo dropForeign().
            $table->dropForeign(['user_id']);
            // Successivamente, rimuove completamente la colonna user_id dalla tabella announcements usando il metodo dropColumn(). Ciò significa che tutte le informazioni contenute nella colonna user_id vengono perse.
            $table->dropColumn(['user_id']);
        });
    }
};
