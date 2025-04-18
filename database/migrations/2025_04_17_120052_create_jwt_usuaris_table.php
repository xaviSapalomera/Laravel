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
        Schema::create('usuaris_jwt', function (Blueprint $table) {
            $table->id();
            
            // Asegúrate que coincida con el tipo de la columna id en usuaris
            $table->unsignedBigInteger('user_id'); // o el tipo correcto que corresponda
            
            $table->string('token', 500)->unique();
            $table->timestamp('expira');;
        
            // Definición de la clave foránea
            $table->foreign('user_id')
                  ->references('id')
                  ->on('usuaris')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jwt_usuaris');
    }
};
