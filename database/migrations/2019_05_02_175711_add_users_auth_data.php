<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUsersAuthData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 0: basic
        // 100: admin

        Schema::table('users', function (Blueprint $table) {
            $table->tinyInteger('access')
            ->default(0)
            ->unsigned()
            ->comment('0:Basic,1:Intermediate,100:Admin');
            $table->boolean('banned')->default(false);
            $table->string('name_last')->after('name');
            $table->string('name_first')->after('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('access');
            $table->dropColumn('banned');
            $table->dropColumn('name_last');
            $table->dropColumn('name_first');
        });
    }
}
