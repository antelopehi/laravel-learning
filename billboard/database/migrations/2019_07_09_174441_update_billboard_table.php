<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateBillboardTable extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::table('billboard', function (Blueprint $table) {
            $table->text('content')->after('id');
            $table->char('title', 100)->after('id');
        });
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::table('billboard', function (Blueprint $table) {
            $table->dropColumn('title');
            $table->dropColumn('content');
        });
    }
}
