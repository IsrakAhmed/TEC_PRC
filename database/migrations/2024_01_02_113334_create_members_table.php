<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('department', 100);
            $table->string('session', 100);
            $table->date('joining_date');
            $table->string('mobile_no');
            $table->string('email', 255);
            $table->text('address');
            $table->string('blood_group');
            $table->string('role');
            $table->timestamps();

            $table->unique('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
}
