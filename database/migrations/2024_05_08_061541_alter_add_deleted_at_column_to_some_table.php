<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterAddDeletedAtColumnToSomeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasColumn('employees', 'deleted_at')) {
            Schema::table('employees', function (Blueprint $table) {
                $table->timestamp('deleted_at')->default(null)->nullable();
            });
        }

        if(!Schema::hasColumn('companies', 'deleted_at')) {
            Schema::table('companies', function (Blueprint $table) {
                $table->timestamp('deleted_at')->default(null)->nullable();
            });
        }

        if(!Schema::hasColumn('files', 'deleted_at')) {
            Schema::table('files', function (Blueprint $table) {
                $table->timestamp('deleted_at')->default(null)->nullable();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('some', function (Blueprint $table) {
            //
        });
    }
}
