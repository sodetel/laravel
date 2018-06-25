<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->increments('id');
            $table->datetime('date');
            $table->integer('applicant_id')->unsigned();
            $table->integer('service_id')->unsigned();
            $table->string('status');
            $table->string('description');
            $table->integer('plan_id');
            $table->timestamps();
        });

        Schema::table('applications', function (Blueprint $table) {
             $table->foreign('applicant_id')
            ->references('id')->on('applicants')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('applications', function($table) {
            $table->dropForeign('applications_applicant_id_foreign');
        });

        Schema::dropIfExists('applications');
    }
}
