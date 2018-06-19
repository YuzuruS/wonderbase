<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('last_name')->after('name')->nullable();
            $table->string('first_name')->after('last_name')->nullable();
            $table->string('last_name_kana')->after('first_name')->nullable();
            $table->string('first_name_kana')->after('last_name_kana')->nullable();
            $table->string('user_type')->after('password')->nullable();
            $table->string('gender')->after('user_type')->nullable();
            $table->string('birthday')->after('gender')->nullable();
            $table->string('address')->after('birthday')->nullable();
            $table->string('company_name')->after('address')->nullable();
            $table->string('company_address')->after('company_name')->nullable();
            $table->string('tel')->after('company_address')->nullable();
            $table->string('self_introduction')->after('tel')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
