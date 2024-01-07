<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProfilesFixNullImage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->dropColumn('image');
        });
        Schema::table('profiles', function (Blueprint $table) {
            $table->binary('image')->nullable()->after('symbol');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->dropColumn('image');
        });
        Schema::table('profiles', function (Blueprint $table) {
            $table->binary('image')->nullable(false)->after('symbol');
        });
    }
}