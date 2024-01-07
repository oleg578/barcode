<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddZplFieldsToPrintersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('printers', function (Blueprint $table) {
            $table->string('zpl_prefix', 2048)
            ->default('')
            ->after('port');
            $table->string('zpl_suffix', 2048)
            ->default('')
            ->after('zpl_prefix');
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
            $table->dropColumn('zpl_prefix');
            $table->dropColumn('zpl_suffix');
        });
    }
}