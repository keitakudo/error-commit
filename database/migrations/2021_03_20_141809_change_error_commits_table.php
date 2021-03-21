<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeErrorCommitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('error_commits', function (Blueprint $table) {
            //スクショとurlにnulを許容
            $table->string('url')->nullable()->change();
            $table->string('screenshot')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('error_commits', function (Blueprint $table) {
            //
        });
    }
}
