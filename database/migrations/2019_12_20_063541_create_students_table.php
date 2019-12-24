<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->string('first_name');
			$table->string('last_name');
			$table->string('parent_name');
            $table->string('mobile_number');
            $table->string('standard');
			$table->string('course');
			$table->string('email_id',191)->unique();
			$table->string('document1')->nullable();
			$table->string('document2')->nullable();
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
        Schema::dropIfExists('students');
    }
}
