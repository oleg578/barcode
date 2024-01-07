<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterPrintersAddOffline extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('printers', function (Blueprint $table) {
            $table->boolean('offline', 0)
            ->default(false)
            ->after('zpl_code');
            $table->dateTime('offlinetime', 0)
            ->nullable()
            ->after('offline');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('printers', function (Blueprint $table) {
            $table->dropColumn('offline');
            $table->dropColumn('offlinetime');
        });
    }
}
