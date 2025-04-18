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
        Schema::table('usuaris', function (Blueprint $table) {
            $table->string('remember_token', 100)->nullable()->after('contrasenya');
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('usuaris', function (Blueprint $table) {
            $table->dropColumn('remember_token');
        });
    }
    
};
