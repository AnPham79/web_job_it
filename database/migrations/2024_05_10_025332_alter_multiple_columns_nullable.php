<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterMultipleColumnsNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            if(Schema::hasColumn('posts', 'district')) {
                $table->string('district')->nullable()->change();
            }

            if(Schema::hasColumn('posts', 'remote')) {
                $table->string('remote')->nullable()->change();
            }

            if(Schema::hasColumn('posts', 'is_partime')) {
                $table->string('is_partime')->nullable()->change();
            }

            if(Schema::hasColumn('posts', 'min_salary')) {
                $table->string('min_salary')->nullable()->change();
            }

            if(Schema::hasColumn('posts', 'max_salary')) {
                $table->string('max_salary')->nullable()->change();
            }

            if(Schema::hasColumn('posts', 'current_salary')) {
                $table->string('current_salary')->nullable()->change();
            }
        }); 

        Schema::table('companies', function (Blueprint $table) {
            if(Schema::hasColumn('companies', 'address')) {
                $table->string('address')->nullable()->change();
            }

            if(Schema::hasColumn('companies', 'address2')) {
                $table->string('address2')->nullable()->change();
            }

            if(Schema::hasColumn('companies', 'city')) {
                $table->string('city')->nullable()->change();
            }

            if(Schema::hasColumn('companies', 'district')) {
                $table->string('district')->nullable()->change();
            }

            if(Schema::hasColumn('companies', 'country')) {
                $table->string('country')->nullable()->change();
            }

            if(Schema::hasColumn('companies', 'zipcode')) {
                $table->string('zipcode')->nullable()->change();
            }

            if(Schema::hasColumn('companies', 'phone')) {
                $table->string('phone')->nullable()->change();
            }

            if(Schema::hasColumn('companies', 'email')) {
                $table->string('email')->nullable()->change();
            }

            if(Schema::hasColumn('companies', 'logo')) {
                $table->string('logo')->nullable()->change();
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
