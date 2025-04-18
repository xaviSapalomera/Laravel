<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
        public function up()
        {
            Schema::table('usuari_auth', function (Blueprint $table) {
                $table->rememberToken(); // Agrega el campo remember_token
            });
        }
        
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('usuari_auth', function (Blueprint $table) {
            //
        });
    }
};
