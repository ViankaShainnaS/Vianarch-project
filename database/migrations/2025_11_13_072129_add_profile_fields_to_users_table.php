<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProfileFieldsToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            if (! Schema::hasColumn('users', 'mobile')) {
                $table->string('mobile')->nullable()->after('email');
            }
            if (! Schema::hasColumn('users', 'gender')) {
                $table->string('gender')->nullable()->after('mobile');
            }
            if (! Schema::hasColumn('users', 'address')) {
                $table->string('address')->nullable()->after('gender');
            }
            if (! Schema::hasColumn('users', 'birthdate')) {
                $table->date('birthdate')->nullable()->after('address');
            }
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'birthdate')) {
                $table->dropColumn('birthdate');
            }
            if (Schema::hasColumn('users', 'address')) {
                $table->dropColumn('address');
            }
            if (Schema::hasColumn('users', 'gender')) {
                $table->dropColumn('gender');
            }
            if (Schema::hasColumn('users', 'mobile')) {
                $table->dropColumn('mobile');
            }
        });
    }
}
