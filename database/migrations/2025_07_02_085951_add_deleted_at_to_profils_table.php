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
        Schema::table('profils', function (Blueprint $table) {
            $table->softDeletes(); // ini menambahkan kolom 'deleted_at' bertipe timestamp nullable
        });
    }

    public function down()
    {
        Schema::table('profils', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
