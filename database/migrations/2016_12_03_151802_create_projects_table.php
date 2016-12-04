<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->string('project_name', 64);
            $table->text('drupalorg_data');
            $table->text('upgrade_comments')->nullable();
            $table->enum('migration_status', ['full', 'partial', 'none', 'fail', 'unknown'])->default('unknown');
            $table->string('migration_issue_url')->default('');
            $table->text('migration_comments')->nullable();
            $table->timestamp('last_retrieved_on')->index();
            $table->timestamps();
            $table->primary('project_name');
        });

        Schema::create('project_modules', function (Blueprint $table) {
            $table->string('name', 128);
            $table->string('project_name', 64)->index();
            $table->boolean('user_submitted')->default(false);
            $table->integer('up_votes')->default(0);
            $table->integer('down_votes')->default(0);
            $table->boolean('verified')->default(false);
            $table->timestamps();
            $table->primary('name');
            // $table->foreign('project_name')->references('project_name')->on('projects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_modules');
        Schema::dropIfExists('projects');
    }
}
