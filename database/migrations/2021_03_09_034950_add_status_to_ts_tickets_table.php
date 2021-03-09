<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToTsTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ts_tickets', function (Blueprint $table) {
            $table->enum('status', ['Not Started', 'In Progress','Resolved','Reopen', 'Closed'])->default('Not Started');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ts_tickets', function (Blueprint $table) {
            //
        });
    }
}
