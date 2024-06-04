<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            // Agrega la columna solo si no existe
            if (!Schema::hasColumn('events', 'user_id')) {
                $table->unsignedBigInteger('user_id')->after('id');
            }
        });
    }

    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            // Elimina la columna solo si existe
            if (!Schema::hasColumn('events', 'user_id')) {
                $table->dropForeign(['user_id']);
                $table->dropColumn('user_id');
            }
        });
    }
};
