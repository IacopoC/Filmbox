<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserFieldsInTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
         $table->string('country')->nullable();
         $table->string('hometown')->nullable();
         $table->string('twitter_username')->nullable();
         $table->string('instagram_username')->nullable();

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
         $table->dropColumn('country');
         $table->dropColumn('hometown');
         $table->dropColumn('twitter_username');
         $table->dropColumn('instagram_username');
          });
    }
}
