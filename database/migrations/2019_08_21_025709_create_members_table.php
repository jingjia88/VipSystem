<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('industry')->nullable();
            $table->string('ename')->nullable();
            $table->string('pr')->nullable();
            $table->string('addr')->nullable();
            $table->string('companyphone')->nullable();
            $table->string('phone')->nullable();
            $table->string('identity')->nullable();
            $table->string('company')->nullable();
            $table->string('conname')->nullable();
            $table->string('conphone')->nullable();
            $table->string('conemail')->nullable();
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
        Schema::dropIfExists('members');
    }
}
