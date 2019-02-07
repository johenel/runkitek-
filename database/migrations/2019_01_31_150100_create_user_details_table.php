<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('users_id');
            $table->text('avatar_url')->nullable();
            $table->string('middle_name');
            $table->string('nick_name');
            $table->date('birth_date');
            $table->string('gender');
            $table->string('group_tag');
            $table->string('nationality');
            $table->string('contact_number');
            $table->string('country');
            $table->text('delivery_address');
            $table->string('emergency_contact_name');
            $table->string('emergency_contact_relationship');
            $table->string('emergency_contact_number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_details');
    }
}
