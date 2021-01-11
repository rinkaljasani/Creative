<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
        $table->string('mobile_number',20)->nullable()->after('password');
        $table->string('address',20)->nullable()->after('mobile_number');
        $table->string('image',20)->nullable()->after('address');        
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
            $table->dropColumn('mobile_number');
            $table->dropColumn('address');
            $table->dropColumn('image');
        });
    }
}



//php artisan make:migration add_paid_to_users_table --table=users